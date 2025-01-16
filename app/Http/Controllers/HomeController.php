<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\QuestionAnswer;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recent_posts = Post::latest()->take(3)->get();
        return view('index', compact('recent_posts'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function contacts()
    {
        return view('pages.contacts');
    }
    public function blogs()
    {
        $query = Post::with('user', 'category', 'content');
        if ($search = request()->get('search')) {
            $query->where('title', 'like', "%{$search}%");
        }
        $post = $query->paginate(4);
        return view('pages.blogs', [
            'categories' => Category::with('post')->get(),
            'posts' => $post,
            'recent_posts' => Post::latest()->take(3)->get()
        ]);
    }
    public function blog(Post $post)
    {
        $recent_posts = Post::latest()->take(3)->get();
        return view('pages.singlepost', [
            'categories' => Category::with('post')->get(),
            'post' => $post->load('user', 'category', 'content', 'attachment'),
            'recent_posts' => $recent_posts
        ]);
    }
}
