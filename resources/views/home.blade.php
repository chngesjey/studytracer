<!-- Ini Bagian setelah login    -->
@extends('layouts.admin', ['heading' => 'Dashboard', 'count_answer' => $count_answer])

@section('main-content')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (auth()->user()->role == \App\RoleEnum::Admin->value)
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Alumni</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $widget['alumni'] }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kategori</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['kategori'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-list-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Postingan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['postingan'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Users -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jawaban Alumni</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['jawaban'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dashboard
                        {{ auth()->user()->role == \App\RoleEnum::Admin->value ? 'Admin' : 'Alumni' }}</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="{{ asset('img/svg/undraw_editable_dywm.svg') }}" alt="">
                    </div>
                    <h4 class="fw-bold text-center mt-5">
                        Selamat Datang <span class="font-weight-bold">{{ ucfirst(auth()->user()->name) }}</span> di Aplikasi
                        Tracer
                        Study SMK Antarika 1 Sidoarjo
                    </h4>
                    <div class="text-center">
                        @if (auth()->user()->alumni)
                            @if ($count_answer > 0)
                                <p class="mt-3 text-primary" style="font-size: 30px">
                                    Terimakasih telah mengisi survey, jawaban anda sangat membantu kami dalam pengembangan
                                    sekolah SMK Antarika 1 Sidoarjo kedepannya.
                                </p>
                            @else
                                @if ($count_answer == 0)
                                    <a href="{{ route('survei.index') }}" class="btn btn-primary" role="button">ISI
                                        KUESIONER</a>
                                @endif
                            @endif
                        @else
                            @if (auth()->user()->role != 'Admin')
                                <a href="{{ route('profile') }}" class="btn btn-primary" role="button">LENGKAPI DATA</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
