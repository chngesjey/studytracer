@extends('layouts.admin', ['heading' => 'Data Alumni'])

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col">
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addAlumni">
                                <i class="fas fa-plus"></i> Alumni
                            </button>
                        </div>
                        <x-modal-basic id="addAlumni">
                            <form action="{{ route('alumni.store') }}" method="post">
                                @csrf
                                @include('alumni.include.form')
                            </form>
                        </x-modal-basic>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-resposive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Awal</th>
                                    <th>Nama Akhir</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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
                data: 'last_name',
                name: 'last_name',
            },
            {
                data: 'email',
                name: 'email',
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
            ajax: "{{ route('alumni.index') }}",
            columns: columns,
        })
    </script>
@endpush
