@extends('layouts.admin', ['heading' => 'Data Postingan'])

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col">
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addPost">
                                <i class="fas fa-plus"></i> Postingan
                            </button>
                        </div>
                        <x-modal-basic id="addPost" size="modal-xl">
                            <form action="{{ route('post.store') }}" method="post">
                                @csrf
                                @include('post.include.form')
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
                                    <th>Pemilik</th>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Tanggal Publikasi</th>
                                    <th>Action</th>
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
    <script src="https://momentjs.com/downloads/moment.js"></script>
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
                data: 'category.name',
                name: 'category',
            },
            {
                data: 'title',
                name: 'title',
            },
            {
                data: 'published_at',
                render: function(data) {
                    if (data != null) {
                        var now = moment();
                        var publishedDate = moment(data);
                        return moment.duration(publishedDate.diff(now)).humanize(true);
                    } else {
                        return `<span class="text-warning">Draft</span>`;
                    }
                },
                name: 'published_at',
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
            ajax: "{{ route('post.index') }}",
            columns: columns,
        })
    </script>
@endpush
