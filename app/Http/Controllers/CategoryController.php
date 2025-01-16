<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Category::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'category.include.action')
                ->toJson();
        }
        return view('category.index');
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
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        try {
            Category::create($validated);
            return redirect()->back()->withSuccess('Berhasil menyimpan data!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal menyimpan data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $validated = $request->validated();
        try {
            Category::where('id', $id)->update($validated);
            return redirect()->back()->withSuccess('Berhasil merubah data!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal merubah data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->back()->withSuccess('Berhasil menghapus data!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal menghapus data!');
        }
    }
}
