@extends('layouts.admin', ['heading' => 'Kuisioner'])
@section('main-content')
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>
    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold" style="color: #4e73df!important">Silahkan isi kuesioner dan jawab dengan jujur
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 content-right" id="start">
                    <div class="card">
                        <div class="card-body">
                            <div id="wizard_container" class="my-auto">
                                <div id="top-wizard">
                                    <div id="progressbar"></div>
                                </div>
                                <!-- /top-wizard -->
                                <form id="wrapped" method="POST" action="{{ route('survei.store') }}">
                                    @csrf
                                    <input id="website" name="website" type="text" value="">
                                    <div id="middle-wizard">
                                        @foreach ($questions as $item)
                                            <div class="step">
                                                <h3 class="main_question">
                                                    <strong>{{ $loop->iteration }}/{{ $questions->count() + 1 }}</strong>
                                                    {{ $item->name }}
                                                </h3>
                                                @foreach ($item->answer as $key => $val)
                                                    <div class="form-group radio_input">
                                                        <label class="container_radio">
                                                            {{-- @dd($answer) --}}
                                                            {{ $val->jawaban }}
                                                            <input type="radio" name="jawaban-{{ $item->id }}"
                                                                value="{{ $val->jawaban }}" class="required" required>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                        <!-- /step-->
                                        <div class="submit step">
                                            <h3 class="main_question">
                                                <strong>{{ $questions->count() + 1 }}/{{ $questions->count() + 1 }}</strong>
                                            </h3>
                                            <div class="summary">
                                                <h5>Terimakasih telah mengisi kuisioner Tracer Study SMK ANTARTIKA 1 Sidoarjo</h5>
                                            </div>
                                        </div>
                                        <!-- /step-->
                                    </div>
                                    <!-- /middle-wizard -->
                                    <div id="bottom-wizard">
                                        <button type="button" name="backward" class="backward">Kembali</button>
                                        <button type="button" name="forward" class="forward">Lanjut</button>
                                        <button type="submit" name="process" class="submit">Simpan</button>
                                    </div>
                                    <!-- /bottom-wizard -->
                                </form>
                            </div>
                            <!-- /Wizard container -->
                        </div>
                    </div>
                </div>
                <!-- /content-right-->
            </div>
        </div>
    </div>
    <!-- /container-fluid -->
@endsection
@push('css')
    <link href="{{ url('survey/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('survey/css/menu.css') }}" rel="stylesheet">
    <link href="{{ url('survey/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('survey/css/vendors.css') }}" rel="stylesheet">
    <link href="{{ url('survey/css/custom.css') }}" rel="stylesheet">
    <script src="{{ url('survey/js/modernizr.js') }}"></script>
@endpush
@push('js')
    <script src="{{ url('survey/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ url('survey/js/common_scripts.min.js') }}"></script>
    <script src="{{ url('survey/js/velocity.min.js') }}"></script>
    <script src="{{ url('survey/js/functions.js') }}"></script>
    <script>
        $(function() {
            $("#wizard_container").wizard({
                stepsWrapper: "#wrapped",
                submit: ".submit",
                beforeSelect: function(event, state) {
                    if ($('input#website').val().length != 0) {
                        return false;
                    }
                    if (!state.isMovingForward)
                        return true;
                    var inputs = $(this).wizard('state').step.find(':input');
                    return !inputs.length || !!inputs.valid();
                }
            }).validate({
                errorPlacement: function(error, element) {
                    if (element.is(':radio') || element.is(':checkbox')) {
                        error.insertBefore(element.next());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        })
    </script>
@endpush
