@props(['id', 'route', 'title', 'size'])
<div class="modal fade" id="{{ $id ?? 'modal' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog {{ $size ?? '' }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title ?? 'Modal' }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            {{-- <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                <a class="btn btn-danger" href="{{ $route ?? '#' }}"
                    onclick="event.preventDefault(); document.getElementById('delete-form').submit();">{{ __('Delete') }}</a>
                <form id="delete-form" action="{{ $route ?? '#' }}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            </div> --}}
        </div>
    </div>
</div>
