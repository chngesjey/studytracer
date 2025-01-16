@extends('layouts.admin', ['heading' => 'Data Category / Edit'])

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col">
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('category.index') }}" class="btn btn-primary" role="button">
                                <i class="fas fa-angle-double-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        @include('category.include.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
