<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\RoleEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KuesionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            // Jika ingin menambahkan pertanyaan bisa copy codingan dibawah ini lalu tinggal ganti pertanyaan
            [
                'question' => 'Apakah Anda bekerja saat ini?',
                'answers' => [
                    'Ya',
                    'Tidak',
                    'Sedang mencari pekerjaan',
                    'Sedang melanjutkan pendidikan'
                ]
            ],
        ];
        $status = [
            'pertama', 'kedua', 'ketiga', 'keempat'
        ];
        $users = User::where('role', RoleEnum::Alumni->value)->get();
        foreach ($questions as $question) {
            $questionModel = Question::create([
                'slug' => Str::slug($question['question']),
                'name' => $question['question'],
            ]);
            $answers = [];
            foreach ($question['answers'] as $key => $answer) {
                $answerModel = Answer::create([
                    'question_id' => $questionModel->id,
                    'jawaban' => $answer,
                    'status' => $status[$key] // ini bisa disesuaikan atau di-random
                ]);

                $answers[] = $answerModel;
            }
            foreach ($users as $key => $user) {
                QuestionAnswer::create([
                    'user_id' => $user->id,
                    'question_id' => $questionModel->id,
                    'answer_id' => $answers[array_rand($answers)]->id // disini random id dari $questionModel->answer 
                ]);
            }
        }
    }
}
