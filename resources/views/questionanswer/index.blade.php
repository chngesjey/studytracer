@extends('layouts.admin', ['heading' => 'Data Jawaban Alumni'])

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <select name="periode" id="periode" class="form-control">
                                <option value="" selected disabled>Pilih Angkatan</option>
                                <option value="all">Semua Angkatan</option>
                                @php
                                    $endYear = 2051;
                                @endphp
                                @for ($firstYear = 2010; $firstYear < $endYear; $firstYear++)
                                    <option value="{{ $firstYear }}"
                                        {{ $firstYear == request()->get('periode') ? 'selected' : '' }}>{{ $firstYear }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-resposive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Tempat/Tanggal Lahir</th>
                                    <th>Lulusan/Angkatan</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Aktifkan Ini jika ingin menampilkan grafik bulat -->
            <!-- <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            @include('questionanswer.chart.alumni_menjawab')
                        </div>
                        <div class="col-4">
                            @include('questionanswer.chart.umur')
                        </div>
                        <div class="col-4">
                            @include('questionanswer.chart.jk')
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Aktifkan Ini Jika Ingin Menampilkan Grafik Batang -->
            <!-- <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @include('questionanswer.chart.jawaban')
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('#periode').on('change', function() {
            window.location.href = "{{ route('questionanswer.index') }}" + `?periode=${$(this).val()}`
        })
    </script>
    {{-- table --}}
    <script>
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'user.name',
                name: 'user',
            },
            {
                data: 'user',
                render: function(data) {
                    if (data.alumni != null) {
                        return data.alumni.alamat
                    } else {
                        return '-'
                    }
                },
                name: 'user'
            },
            {
                data: 'user.email',
                name: 'user',
            },
            {
                data: 'user.alumni.telepon',
                name: 'user.alumni.telepon',
            },
            {
                data: 'user.alumni',
                render: function(data) {
                    return data.tempat_lahir + ', ' + data.tanggal_lahir
                },
                name: 'user.alumni',
            },
            {
                data: 'user.alumni.tahun_lulus',
                name: 'user.alumni.tahun_lulus',
            },
        ]
        var periode = getParameterByName('periode');
        var url = "{{ route('questionanswer.index') }}"
        if (periode != null) {
            url += `?periode=${periode}`
        }
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            columns: columns,
        })

        function getParameterByName(name) {
            var url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
    </script>
@endpush
