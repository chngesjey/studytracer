<div class="button-group" role="group">
    <a href="{{ route('answer.edit', $model->id) }}" class="btn btn-warning btn-sm" role="button">
        <i class="fas fa-pencil"></i>
    </a>
    {{-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-detail-{{ $model->id }}">
        <i class="fas fa-eye"></i>
    </button>
    <x-modal-basic id="modal-detail-{{ $model->id }}">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>Fullname</th>
                    <td>{{ $model->fullname }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $model->email }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $model->alumni != null ? $model->alumni->alamat : '-' }}</td>
                </tr>
                <tr>
                    <th>Tempat/Tanggal Lahir</th>
                    <td>{{ $model->alumni != null ? $model->alumni->tempat_lahir . ', ' . $model->alumni->tanggal_lahir : '-' }}
                    </td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ $model->alumni != null ? $model->alumni->telepon : '-' }}</td>
                </tr>
                <tr>
                    <th>Tahun Lulus</th>
                    <td>{{ $model->alumni != null ? $model->alumni->tahun_lulus : '-' }}</td>
                </tr>
            </table>
        </div>
    </x-modal-basic> --}}
    <form action="{{ route('answer.destroy', $model->id) }}" method="post" class="d-inline"
        onsubmit="return confirm('Are you sure to delete this record?')">
        @csrf
        @method('delete')
        <button class="btn btn-danger btn-sm">
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>
