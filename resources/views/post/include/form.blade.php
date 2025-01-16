<div>
    <div class="form-group">
        <label for="category_id">Kategori</label>
        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
            <option value="" selected disabled>Pilih Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ isset($post) ? ($post->category->id == $category->id ? 'selected' : '') : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            value="{{ isset($post) ? $post->title : old('title') }}" />
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="excerpt">Penjelasan Singkat</label>
        <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt">{{ isset($post) ? $post->excerpt : old('excerpt') }}</textarea>
        @error('excerpt')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Konten</label>
        @if (request()->routeIs('post.index'))
            @trix(\App\Post::class, 'content')
        @else
            @trix($post, 'content')
        @endif
        @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    {{-- <div class="form-group">
        <label for="tahun_lulus">Tahun Lulus</label>
        <input type="year" class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus"
            name="tahun_lulus"
            value="{{ isset($alumni) ? ($alumni->alumni != [] ? $alumni->alumni->tahun_lulus : old('tahun_lulus')) : old('tahun_lulus') }}">
        @error('tahun_lulus')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div> --}}
    <div class="form-group">
        <button class="btn btn-primary" name="submit[]" type="submit" value="publish">
            @if (isset($post))
                {{ _('Save changes') }}
            @else
                {{ _('Save') }}
            @endif
        </button>
        <button class="btn btn-warning" name="submit[]" type="submit" value="draft">Draft</button>
    </div>
</div>
