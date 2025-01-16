@extends('layouts.home')
@section('content')
    <section class="pager-section">
        <div class="container">
            <div class="pager-content text-center">
                <h2>Postingan</h2>
                <ul>
                    <li><a href="/" title="">Home</a></li>
                    <li><span>Postingan</span></li>
                </ul>
            </div>
            <h2 class="page-titlee">SMKN 1</h2>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-section p-0 posts-page">
                        <div class="blog-posts">
                            @foreach ($posts as $post)
                                <div class="blog-post">
                                    <div class="blog-thumbnail">
                                        <a href="#" title="">
                                            <img src="{{ url('storage/', $post->attachment[0]->attachment) }}"
                                                alt="" class="w-100">
                                        </a>
                                        <span class="category">{{ $post->category->name }}</span>
                                    </div>
                                    <div class="blog-info">
                                        <ul class="meta">
                                            <li><a href="#"
                                                    title="">{{ $post->created_at->diffForHumans() }}</a>
                                            </li>
                                            <li><a href="#" title="">Oleh {{ $post->user->name }}</a></li>
                                        </ul>
                                        <h3 class="stick">
                                            <a href="{{ route('landing.single_post', $post->slug) }}"
                                                title="">{{ $post->title }}</a>
                                        </h3>
                                        <p>
                                            {{ $post->excerpt() }}
                                        </p>
                                        <a href="{{ route('landing.single_post', $post->slug) }}" title=""
                                            class="read-more">Selengkapnya <i class="fa fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--blog-posts end-->
                    </div><!--blog-section end-->
                    <div class="mdp-pagination">
                        {{ $posts != null ? $posts->links() : '' }}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget widget-search">
                            <form action="{{ route('landing.blogs') }}" method="GET">
                                <input type="text" name="search" placeholder="Cari berdasarkan judul">
                                <button type="submit"><img src="{{ url('frontend/assets/img/icon4.png') }}"
                                        alt=""></button>
                            </form>
                        </div>
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
