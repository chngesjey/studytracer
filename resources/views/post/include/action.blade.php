<div class="button-group" role="group">
    <a href="{{ route('post.edit', $model->id) }}" class="btn btn-warning btn-sm" role="button">
        <i class="fas fa-pencil"></i>
    </a>
    {{-- <a href="{{ route('post.show', $model->id) }}" class="btn btn-primary btn-sm">
        <i class="fas fa-eye"></i>
    </a> --}}
    <form action="{{ route('post.destroy', $model->id) }}" method="post" class="d-inline"
        onsubmit="return confirm('Are you sure to delete this record?')">
        @csrf
        @method('delete')
        <button class="btn btn-danger btn-sm">
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>
