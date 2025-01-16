@extends('layouts.admin', ['heading' => 'Data Jawaban'])

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col">
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addJawaban">
                                <i class="fas fa-plus"></i> Jawaban
                            </button>
                        </div>
                        <x-modal-basic id="addJawaban" size="modal-xl">
                            <form action="{{ route('answer.store') }}" method="post">
                                @csrf
                                @include('answer.include.form')
                            </form>
                        </x-modal-basic>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-resposive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <td class="text-center">#</td>
                                    <td class="text-center">Pertanyaan</td>
                                    <td class="text-center">Pilihan Jawaban</td>
                                    <td class="text-center">Aksi</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'answer',
                render: function(data) {
                    var list = ''
                    data.map((val) => {
                        list += `<ul>
                            <li>${val.jawaban}</li>
                        </ul>`;
                    })
                    return list
                },
                name: 'answer',
                orderable: false,
                searchable: false
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('answer.index') }}",
            columns: columns,
        })
    </script>
@endpush
