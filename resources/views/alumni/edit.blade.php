@extends('layouts.admin', ['heading' => 'Data Alumni / Edit'])

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col">
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('alumni.index') }}" class="btn btn-primary" role="button">
                                <i class="fas fa-angle-double-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('alumni.update', $alumni->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        @include('alumni.include.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
