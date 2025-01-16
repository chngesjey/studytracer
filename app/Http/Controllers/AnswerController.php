<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;
use Yajra\DataTables\Facades\DataTables;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Question::with('answer')->whereHas('answer', function ($q) {
                return $q;
            })->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'answer.include.action')
                ->toJson();
        }
        $question = Question::whereDoesntHave('answer')->get()->toArray();
        return view('answer.index', compact('question'));
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
    public function store(AnswerRequest $request)
    {
        $validated = $request->validated();
        try {
            $array_data = [];
            if ($validated['jawaban_pertama']) {
                array_push($array_data, [
                    'question_id' => $validated['question_id'],
                    'jawaban' => $validated['jawaban_pertama'],
                    'status' => 'pertama',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            if ($validated['jawaban_kedua']) {
                array_push($array_data, [
                    'question_id' => $validated['question_id'],
                    'jawaban' => $validated['jawaban_kedua'],
                    'status' => 'kedua',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            if ($validated['jawaban_ketiga']) {
                array_push($array_data, [
                    'question_id' => $validated['question_id'],
                    'jawaban' => $validated['jawaban_ketiga'],
                    'status' => 'ketiga',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            if ($validated['jawaban_keempat']) {
                array_push($array_data, [
                    'question_id' => $validated['question_id'],
                    'jawaban' => $validated['jawaban_keempat'],
                    'status' => 'keempat',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            Answer::insert($array_data);
            return redirect()->back()->with(['success' => 'Data berhasil disimpan']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Data gagal disimpan']);
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
    public function edit(Question $answer)
    {
        $answer->load('answer');
        $question = Question::all()->toArray();
        return view('answer.edit', compact('answer', 'question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnswerRequest $request, string $id)
    {
        $validated = $request->validated();
        try {
            if ($validated['jawaban_pertama']) {
                $array_data = [
                    'question_id' => $validated['question_id'],
                    'jawaban' => $validated['jawaban_pertama'],
                ];
                Answer::where('question_id', $id)->where('status', 'pertama')->update($array_data);
            }
            if ($validated['jawaban_kedua']) {
                $array_data = [
                    'question_id' => $validated['question_id'],
                    'jawaban' => $validated['jawaban_kedua'],
                ];
                Answer::where('question_id', $id)->where('status', 'kedua')->update($array_data);
            }
            if ($validated['jawaban_ketiga']) {
                $array_data = [
                    'question_id' => $validated['question_id'],
                    'jawaban' => $validated['jawaban_ketiga'],
                ];
                Answer::where('question_id', $id)->where('status', 'ketiga')->update($array_data);
            }
            if ($validated['jawaban_keempat']) {
                $array_data = [
                    'question_id' => $validated['question_id'],
                    'jawaban' => $validated['jawaban_keempat'],
                ];
                Answer::where('question_id', $id)->where('status', 'keempat')->update($array_data);
            }
            return redirect('/answer')->with(['success' => 'Data berhasil diubah']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Data gagal diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $answer)
    {
        try {
            Answer::where('question_id', $answer->id)->delete();
            return redirect()->back()->with(['success' => 'Data berhasil dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Data gagal dihapus']);
        }
    }
}
