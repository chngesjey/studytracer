@extends('layouts.admin')
@section('main-content')
    <div class="card my-5">
        <div class="card-body">
            <div class="container">
                <form action="{{ route('survei.store') }}" method="POST">
                    @csrf
                    @php
                        $answer = [
                            'Setuju',
                            'Tidak Setuju',
                            'Sangat Setuju',
                            'Sangat Tidak Setuju',
                            'Baik',
                            'Sangat Baik',
                            'Cukup',
                            'Kurang',
                        ];
                    @endphp
                    @include('survei.svg')
                    @foreach ($questions as $question)
                        <div class="mb-5">
                            <h6 class="font-weight-bold">{{ $question->name }}</h6>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban-{{ $question->id }}[]"
                                            id="jawaban_pertama-{{ $question->id }}"
                                            value="{{ $question->answer[0]->jawaban }}">
                                        <label class="form-check-label" for="jawaban_pertama-{{ $question->id }}">
                                            {{ $answer[$question->answer[0]->jawaban - 1] }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban-{{ $question->id }}[]"
                                            id="jawaban_kedua-{{ $question->id }}"
                                            value="{{ $question->answer[1]->jawaban }}">
                                        <label class="form-check-label" for="jawaban_kedua-{{ $question->id }}">
                                            {{ $answer[$question->answer[1]->jawaban - 1] }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban-{{ $question->id }}[]"
                                            id="jawaban_ketiga-{{ $question->id }}"
                                            value="{{ $question->answer[2]->jawaban }}">
                                        <label class="form-check-label" for="jawaban_ketiga-{{ $question->id }}">
                                            {{ $answer[$question->answer[2]->jawaban - 1] }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban-{{ $question->id }}[]"
                                            id="jawaban_keempat-{{ $question->id }}"
                                            value="{{ $question->answer[3]->jawaban }}">
                                        <label class="form-check-label" for="jawaban_keempat-{{ $question->id }}">
                                            {{ $answer[$question->answer[3]->jawaban - 1] }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
