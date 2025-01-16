<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\PostEnum;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Post::with('user', 'category')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'post.include.action')
                ->toJson();
        }
        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $validated = $request->validated();
        try {
            $validated['user_id'] = auth()->id();
            $validated['slug'] = Str::slug($validated['title']);
            $validated['status'] = $request->submit[0] == 'publish' ? PostEnum::Published->value : PostEnum::Draft->value;
            $validated['published_at'] = $request->submit[0] == 'publish' ? now() : null;
            Post::create($validated);
            return redirect()->back()->with('success', 'Berhasil menyimpan data!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menyimpan data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post->load('user', 'category');
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->validated();
        try {
            $validated['user_id'] = auth()->id();
            $validated['slug'] = Str::slug($validated['title']);
            $validated['status'] = $request->submit[0] == 'publish' ? PostEnum::Published->value : PostEnum::Draft->value;
            $validated['published_at'] = $request->submit[0] == 'publish' ? now() : null;
            $post->update($validated);
            return redirect()->back()->with('success', 'Berhasil merubah data!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal merubah data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return redirect()->back()->withSuccess('Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal menghapus data!');
        }
    }
}
