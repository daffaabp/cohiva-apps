<div class="row padding-1 p-1">
    <div class="col-md-12">
        <input type="hidden" name="id_konselor" value="{{ $id_konselor }}">
        <div class="form-group mb-2 mb20 jadwaltersedia">
            <label for="id_jadwalkonselor" class="form-label">{{ __('Jadwal Tersedia') }}</label>
            @foreach ($jadwalkonselors as $jadwalkonselor)
                <div class="form-check">
                    <input class="form-check-input" value="{{ $jadwalkonselor->id }}"
                        {{ old('id_jadwalkonselor') == $jadwalkonselor->id ? 'checked' : '' }} type="radio"
                        name="id_jadwalkonselor" id="flexRadioDefault{{ $jadwalkonselor->id }}">
                    <label class="form-check-label" for="flexRadioDefault{{ $jadwalkonselor->id }}">
                        {{ $jadwalkonselor->hari }}, {{ $jadwalkonselor->jam }} WIB
                    </label>
                </div>
            @endforeach
        </div>

        <div class="form-group mb-4 mb20">
            <label for="id_pasien" class="form-label">{{ __('Pasien') }}</label>
            <select name="id_pasien" id="id_pasien" class="form-select js-example-basic-single">
                @foreach ($pasiens as $pasien)
                    <option value="{{ $pasien->id_pasien }}">
                        {{ $pasien->nama_pasien . ' | ' . $pasien->alamat_pasien }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_pasien', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="tgl_janji_konseling" class="form-label">{{ __('Tanggal Janji') }}</label>
            <input type="date" name="tgl_janji_konseling"
                class="form-control @error('tgl_janji_konseling') is-invalid @enderror"
                value="{{ old('tgl_janji_konseling', $janjiKonseling?->tgl_janji_konseling) }}"
                id="tgl_janji_konseling" placeholder="Tanggal Janji"
                min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            {!! $errors->first(
                'tgl_janji_konseling',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        @can('janji-konselings.store')
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        @endcan

        <a href="{{ route('janjikonseling.pilihkonselor') }}" class="btn btn-outline-dark ms-2">Kembali</a>
    </div>
</div>
