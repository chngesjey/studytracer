<div>
    <div class="form-group">
        <label for="question_id">Pertanyaan</label>
        <select name="question_id" id="question_id" class="form-control">
            <option value="" selected disabled>Pilih Pertanyaan</option>
            @foreach ($question as $item)
                <option value="{{ $item['id'] }}"
                    {{ isset($answer) ? ($answer->id == $item['id'] ? 'selected' : '') : '' }}>
                    {{ $item['name'] }}
                </option>
            @endforeach
        </select>
        @error('question_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    @if (request()->routeIs('answer.index'))
        <div class="form-group">
            <label for="jawaban_pertama">Jawaban Pertama</label>
            <input type="text" class="form-control @error('jawaban_pertama') is-invalid @enderror"
                name="jawaban_pertama" id="jawaban_pertama" value="{{ old('jawaban_pertama') }}">
            </input>
            @error('jawaban_pertama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jawaban_kedua">Jawaban Kedua</label>
            <input type="text" class="form-control @error('jawaban_kedua') is-invalid @enderror" name="jawaban_kedua"
                id="jawaban_kedua" value="{{ old('jawaban_kedua') }}">
            </input>
            @error('jawaban_kedua')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jawaban_ketiga">Jawaban Ketiga</label>
            <input class="form-control @error('jawaban_ketiga') is-invalid @enderror" name="jawaban_ketiga"
                id="jawaban_ketiga" value="{{ old('jawaban_ketiga') }}"></input>
            @error('jawaban_ketiga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jawaban_keempat">Jawaban Keempat</label>
            <input type="text" class="form-control @error('jawaban_keempat') is-invalid @enderror"
                name="jawaban_keempat" id="jawaban_keempat">
            </input>
            @error('jawaban_keempat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    @else
        @foreach ($answer->answer as $val)
            <div class="form-group">
                <label for="jawaban_{{ Illuminate\Support\Str::slug($val->status) }}">Jawaban
                    {{ ucwords($val->status) }}</label>
                <input type="text"
                    class="form-control @error("jawaban_{{ Illuminate\Support\Str::slug($val->status) }}") is-invalid @enderror"
                    id="jawaban_{{ Illuminate\Support\Str::slug($val->status) }}"
                    name="jawaban_{{ Illuminate\Support\Str::slug($val->status) }}"
                    value="{{ $val->jawaban ?? old('jawaban_' . Illuminate\Support\Str::slug($val->status)) }}">
                </input>
                @error("jawaban_{{ Illuminate\Support\Str::slug($val->status) }}")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endforeach
    @endif
    <div class="form-group">
        <button class="btn btn-primary" type="submit">
            @if (isset($answer))
                {{ _('Save changes') }}
            @else
                {{ _('Save') }}
            @endif
        </button>
    </div>
</div>
