<div class="row padding-1 p-1">
    <div class="col-md-6">

        <div class="form-group mb-2 mb20">
            <label for="tgl_konseling" class="form-label">{{ __('Tgl Konseling') }}</label>
            <input type="date" name="tgl_konseling" class="form-control @error('tgl_konseling') is-invalid @enderror"
                value="{{ old('tgl_konseling', $konseling?->tgl_konseling) }}" id="tgl_konseling"
                placeholder="Tgl Konseling">
            {!! $errors->first(
                'tgl_konseling',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>


        <div class="form-group mb-2 mb20">
            {{-- contoh status_pasien:
            1. Positif HIV
            2. Aids
            3. Tes HIV
            4. Terjadwal konseling
            5. Dalam perawatan
            6. Remisi --}}
            <label for="status_pasien" class="form-label">{{ __('Status Pasien') }}</label>
            <select name="status_pasien" id="status_pasien" class="form-select">
                <option value="Positif HIV" {{ $konseling->status_pasien == 'Positif HIV' ? 'selected' : '' }}>Positif
                    HIV</option>
                <option value="Aids" {{ $konseling->status_pasien == 'Aids' ? 'selected' : '' }}>Aids</option>
                <option value="Tes HIV" {{ $konseling->status_pasien == 'Tes HIV' ? 'selected' : '' }}>Tes HIV
                </option>
                <option value="Terjadwal Konseling"
                    {{ $konseling->status_pasien == 'Terjadwal Konseling' ? 'selected' : '' }}>Terjadwal Konseling
                </option>
                <option value="Dalam Perawatan" {{ $konseling->status_pasien == 'Dalam Perawatan' ? 'selected' : '' }}>
                    Dalam Perawatan</option>
                <option value="Remisi" {{ $konseling->status_pasien == 'Remisi' ? 'selected' : '' }}>Remisi</option>
            </select>
            {!! $errors->first(
                'status_pasien',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="keluhan" class="form-label">{{ __('Keluhan') }}</label>
            <textarea class="form-control @error('keluhan') is-invalid @enderror" name="keluhan"
                placeholder="Catatan keluhan pasien" id="keluhan" style="height: 100px">{{ old('keluhan', $konseling?->keluhan) }}</textarea>
            {!! $errors->first('keluhan', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="penilaian" class="form-label">{{ __('Penilaian') }}</label>
            <input type="text" name="penilaian" class="form-control @error('penilaian') is-invalid @enderror"
                value="{{ old('penilaian', $konseling?->penilaian) }}" id="penilaian" placeholder="Penilaian">
            {!! $errors->first('penilaian', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


    </div>
    <div class="col-md-6">
        <label for="keterangan" class="form-label">Keterangan</label>
        <div class="form-group mb-2 mb20">
            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Keterangan"
                id="keterangan" style="height: 100px">{{ old('penilaian', $konseling?->keterangan) }}</textarea>
            {!! $errors->first('keterangan', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jenis_konseling" class="form-label">{{ __('Jenis Konseling') }}</label>
            <select name="jenis_konseling" class="form-select" id="jenis_konseling">
                <option value="Terbuka" {{ $konseling->jenis_konseling == 'Terbuka' ? 'selected' : '' }}>Terbuka
                </option>
                <option value="Tertutup" {{ $konseling->jenis_konseling == 'Tertutup' ? 'selected' : '' }}>Tertutup
                </option>
            </select>
            {!! $errors->first(
                'jenis_konseling',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status_konseling" class="form-label">{{ __('Status Konseling') }}</label>
            <select name="status_konseling" class="form-select" id="status_konseling">
                <option value="Selesai" {{ $konseling->status_konseling == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="Membutuhkan Tindak Lanjut" {{ $konseling->status_konseling == 'Membutuhkan Tindak Lanjut' ? 'selected' : '' }}>Membutuhkan Tindak Lanjut</option>
            </select>
            {!! $errors->first(
                'status_konseling',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>

        @can('konselings.index')
            <a href="{{ route('konselings.index') }}" class="btn btn-outline-dark ms-2">Kembali</a>
        @endcan

        @hasanyrole('Konselor')
            @can('konselings.konselingbykonselor')
                <a href="{{ route('konselings.konselingbykonselor') }}" class="btn btn-outline-dark ms-2">Kembali</a>
            @endcan
        @endhasanyrole
    </div>
</div>
