@extends('layouts.home')
@section('content')
    {{-- @dd($post) --}}
    <section class="pager-section blog-version">
        <div class="container">
            <div class="pager-content text-center">
                <ul>
                    <li><a href="{{ route('landing.index') }}" title="">Beranda</a></li>
                    <li><a href="{{ route('landing.blogs') }}" title="">Postingan</a></li>
                    <li><span>{{ $post->title }}</span></li>
                </ul>
                <h2>{{ $post->title }}</h2>
                <span class="category">{{ $post->category->name }}</span>
                <ul class="meta">
                    <li><a href="#" title="">{{ $post->created_at->diffForHumans() }}</a></li>
                    <li><a href="#" title="">Oleh {{ $post->user->name }}</a></li>
                </ul>
            </div><!--pager-content end-->
        </div>
    </section><!--pager-section end-->
    <section class="page-content p80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-post single">
                        <div class="card shadow">
                            <div class="card-body">
                                {!! $post->trixRender('content') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget widget-categories">
                            <h3 class="widget-title">Kategori</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        {{ $category->name }}
                                        <span>{{ count($category->post) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget-posts">
                            <h3 class="widget-title">Postingan Terbaru</h3>
                            <div class="wd-posts">
                                @foreach ($recent_posts as $recent)
                                    <div class="wd-post d-flex flex-wrap">
                                        <div class="wd-thumb">
                                            <img src="{{ url('storage/', $recent->attachment[0]->attachment) }}"
                                                alt="" width="52" height="52">
                                        </div>
                                        <div class="wd-info">
                                            <h3><a href="{{ route('landing.single_post', $recent->slug) }}"
                                                    title="">{{ $recent->title }}</a>
                                            </h3>
                                            <span>{{ $recent->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
    <style>
        .pager-section.blog-version {
            background-image: url('{{ url('storage/', $post->attachment[0]->attachment) }}');
            padding: 169px 0 242px;
            position: relative;
            background-position: 50%;
            background-size: cover;
        }
    </style>
@endpush
