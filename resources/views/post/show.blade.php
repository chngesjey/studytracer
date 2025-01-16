@extends('layouts.admin', ['heading' => 'Detail Postingan'])

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        {!! $post->trixRender('content') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
