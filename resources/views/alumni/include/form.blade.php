<div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="name">Nama Awal</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ isset($alumni) ? $alumni->name : old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="last_name">Nama Akhir</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                    name="last_name" value="{{ isset($alumni) ? $alumni->last_name : old('last_name') }}">
                @error('last_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            value="{{ isset($alumni) ? $alumni->email : old('email') }}">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
            name="password">
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">
            @if (isset($alumni))
                {{ _('Save changes') }}
            @else
                {{ _('Save') }}
            @endif
        </button>
    </div>
</div>
