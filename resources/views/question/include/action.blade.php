<div class="button-group" role="group">
    <a href="{{ route('question.edit', $model->id) }}" class="btn btn-warning btn-sm" role="button">
        <i class="fas fa-pencil"></i>
    </a>
    {{-- <form action="{{ route('question.destroy', $model->id) }}" method="post" class="d-inline"
        onsubmit="return confirm('Are you sure to delete this record?')">
        @csrf
        @method('delete')
        <button class="btn btn-danger btn-sm">
            <i class="fas fa-trash"></i>
        </button>
    </form> --}}
</div>
