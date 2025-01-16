<?php

namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AlumniAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $periode = request()->get('periode');
            $query = QuestionAnswer::with('user', 'user.alumni');
            if ($periode && $periode != 'all') {
                $query->whereHas('user.alumni', function ($query) use ($periode) {
                    $query->whereYear('tahun_lulus', $periode);
                });
            }
            $data = $query->select('user_id')->distinct()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->toJson();
        }
        return view('questionanswer.index');
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
