<div class="row padding-1 p-1">
    <div class="col-md-6">

        <input type="hidden" name="id_jadwalkonselor" value="{{ $janjiKonseling->id_jadwalkonselor }}">
        <div class="form-group mb-2 mb20">
            <label for="tgl_janji_konseling" class="form-label">{{ __('Tanggal Janji') }}</label>
            <input type="date" name="tgl_janji_konseling"
                class="form-control @error('tgl_janji_konseling') is-invalid @enderror"
                value="{{ old('tgl_janji_konseling', $janjiKonseling?->tgl_janji_konseling) }}" id="tgl_janji_konseling"
                placeholder="Tanggal Janji" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            {!! $errors->first(
                'tgl_janji_konseling',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="status_janji" class="form-label">{{ __('Status Janji') }}</label>
            <div class="form-check mb-2">
                <input class="form-check-input" value="DIJADWALKAN"
                    {{ $janjiKonseling->status_janji == 'DIJADWALKAN' ? 'checked' : '' }} type="radio"
                    name="status_janji" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    DIJADWALKAN
                </label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" value="TERLAKSANA"
                    {{ $janjiKonseling->status_janji == 'TERLAKSANA' ? 'checked' : '' }} type="radio"
                    name="status_janji" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    TERLAKSANA
                </label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" value="DIBATALKAN"
                    {{ $janjiKonseling->status_janji == 'DIBATALKAN' ? 'checked' : '' }} type="radio"
                    name="status_janji" id="flexRadioDefault3">
                <label class="form-check-label" for="flexRadioDefault3">
                    DIBATALKAN
                </label>
            </div>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        @can('janji-konselings.update')
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        @endcan
        <a href="{{ route('janji-konselings.index') }}" class="btn btn-outline-dark ms-2">Kembali</a>
    </div>
</div>
