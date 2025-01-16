<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function alumni()
    {
        if (request()->ajax()) {
            $periode = request()->get('periode');
            $alumni_menjawab = QuestionAnswer::with('user', 'user.alumni');
            if ($periode && $periode != 'all') {
                $alumni_menjawab->whereHas('user.alumni', function ($query) use ($periode) {
                    $query->whereYear('tahun_lulus', $periode);
                });
            }
            $alumni_menjawab = $alumni_menjawab->select('user_id')->distinct()->get();
            $alumni = [
                'total' => User::where('role', 'alumni')->count(),
                'datasets' => [
                    $alumni_menjawab->count(),
                    User::where('role', 'alumni')->count() - $alumni_menjawab->count(),
                ],
            ];
            return response()->json($alumni);
        }
    }
    public function jk()
    {
        if (request()->ajax()) {
            $periode = request()->get('periode');
            $query = User::with('alumni');
            if ($periode && $periode != 'all') {
                $query->whereHas('alumni', function ($query) use ($periode) {
                    $query->whereYear('tahun_lulus', $periode);
                });
            }
            $user_alumni = $query->get();
            if ($user_alumni->isNotEmpty()) {
                $lk = 0;
                $pr = 0;
                foreach ($user_alumni as $user) {
                    if ($user->alumni && $user->alumni->jenis_kelamin) {
                        if ($user->alumni->jenis_kelamin == 'Laki-Laki') {
                            $lk += 1;
                        }
                        if ($user->alumni->jenis_kelamin == 'Perempuan') {
                            $pr += 1;
                        }
                    }
                    $age = [
                        'lk' => $lk,
                        'pr' => $pr,
                    ];
                }
                return response()->json($age);
            }
        }
    }
    public function umur()
    {
        if (request()->ajax()) {
            $periode = request()->get('periode');
            $query = User::with('alumni');
            if ($periode && $periode != 'all') {
                $query->whereHas('alumni', function ($query) use ($periode) {
                    $query->whereYear('tahun_lulus', $periode);
                });
            }
            $user_alumni = $query->get();
            $age = ['dewasa' => 0, 'remaja' => 0];
            if ($user_alumni->isNotEmpty()) {
                foreach ($user_alumni as $user) {
                    if ($user->alumni && $user->alumni->tanggal_lahir) {
                        $birthdate = Carbon::parse($user->alumni->tanggal_lahir);
                        $currentAge = $birthdate->age;
                        if ($currentAge >= 25) {
                            $age['dewasa']++;
                        } elseif ($currentAge >= 14 && $currentAge <= 24) {
                            $age['remaja']++;
                        }
                    }
                }
            }
            return response()->json($age);
        }
    }
    public function jawaban()
    {
        $periode = request()->get('periode');
        $questions = Question::with(['answer' => function ($query) {
            $query->select('id', 'question_id', 'jawaban');
        }])->get();

        // Data untuk chart
        $chartData = [];
        $totalUsers = User::when($periode, function ($query) use ($periode) {
            return $query->whereHas('alumni', function ($query) use ($periode) {
                $query->whereYear('tahun_lulus', $periode);
            });
        })->count();
        foreach ($questions as $question) {
            $data = [
                'question' => $question->name,
                'answers' => []
            ];

            foreach ($question->answer as $answer) {
                $count = QuestionAnswer::with('user', 'user.alumni')->where('question_id', $question->id)
                    ->where('answer_id', $answer->id);
                if ($periode && $periode != 'all') {
                    $count->whereHas('user.alumni', function ($query) use ($periode) {
                        $query->whereYear('tahun_lulus', $periode);
                    });
                }
                $count = $count->count();
                $percentage = ($totalUsers > 0) ? ($count / $totalUsers) * 100 : 0;
                $percentage = round($percentage, 2);
                $data['answers'][] = [
                    'jawaban' => $answer->jawaban,
                    'count' => $percentage
                ];
            }

            $chartData[] = $data;
        }
        return response()->json($chartData);
    }
}
