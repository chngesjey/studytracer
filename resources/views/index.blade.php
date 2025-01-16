<!-- Bagian Bawahnya  Home Yang Ada Jurusan nya -->
@extends('layouts.home')
@section('content')
    <section class="about-us-section">
        <div class="container">
            <div class="section-title text-center">
                <h2>Selamat Datang di <span>SMK Antartika 1 Sidoarjo</span></h2>
                <p>SMK Antartika Sidoarjo 1 membuka pelayanan pendidikan yang sesuai dengan kebutuhan dunia kerja, diantaranya</p>
            </div><!--section-title end-->
            <div class="about-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="abt-col wow fadeInUp" data-wow-duration="1000ms">
                                <img src="{{ url('frontend/assets/img/icon5.png') }}" alt="">
                                <h3>Rekayasa Perangkat Lunak</h3>
                            </div><!--abt-col end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="abt-col wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="200ms">
                                <img src="{{ url('frontend/assets/img/icon7.png') }}" alt="">
                                <h3>Teknik Pemesinan</h3>
                            </div><!--abt-col end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="abt-col wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
                                <img src="{{ url('frontend/assets/img/icon8.png') }}" alt="">
                                <h3>Teknik Kendaraan Ringan</h3>
                            </div><!--abt-col end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="abt-col wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <img src="{{ url('frontend/assets/img/icon9.png') }}" alt="">
                                <h3>Teknik Kelistrikan</h3>
                            </div><!--abt-col end-->
                        </div>
                    </div>
                </div>
            </div><!--about-rw end-->
        </div>
    </section>
@endsection
