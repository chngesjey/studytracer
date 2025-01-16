<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\QuestionAnswer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    public function index()
    {
        $alumni = User::where('role', 'Alumni')->get()->count();
        $kategori = Category::count();
        $postingan = Post::count();
        $jawaban = QuestionAnswer::count();
        $widget = [
            'alumni' => $alumni,
            'kategori' => $kategori,
            'postingan' => $postingan,
            'jawaban' => $jawaban,
        ];
        $count_answer = 0;
        if (auth()->user()->role == 'Alumni') {
            $count_answer  = QuestionAnswer::where('user_id', auth()->id())->count();
        }
        return view('home', [
            'widget' => $widget,
            'count_answer' => $count_answer
        ]);
    }
}
