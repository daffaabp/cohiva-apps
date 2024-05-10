<div class="row padding-1 p-1">
    <div class="col-md-6">

        <div class="form-group mb-2 mb20">
            <label for="nama_pasien" class="form-label">{{ __('Nama Pasien') }} <span class="text-danger">*</span></label>
            <input type="text" name="nama_pasien" class="form-control @error('nama_pasien') is-invalid @enderror"
                value="{{ old('nama_pasien', $pasien?->nama_pasien) }}" id="nama_pasien" placeholder="Nama Pasien">
            {!! $errors->first('nama_pasien', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="alamat_pasien" class="form-label">{{ __('Alamat Pasien') }} <span class="text-danger">*</span></label>
            <input type="text" name="alamat_pasien" class="form-control @error('alamat_pasien') is-invalid @enderror"
                value="{{ old('alamat_pasien', $pasien?->alamat_pasien) }}" id="alamat_pasien"
                placeholder="Alamat Pasien">
            {!! $errors->first(
                'alamat_pasien',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="notelpon_pasien" class="form-label">{{ __('Notelpon Pasien') }} <span class="text-danger">*</span></label>
            <input type="text" name="notelpon_pasien"
                class="form-control @error('notelpon_pasien') is-invalid @enderror"
                value="{{ old('notelpon_pasien', $pasien?->notelpon_pasien) }}" id="notelpon_pasien"
                placeholder="Notelpon Pasien">
            {!! $errors->first(
                'notelpon_pasien',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        

    </div>
    <div class="col-md-6">
        <div class="form-group mb-2 mb20">
            <label for="id_user" class="form-label">{{ __('Jenis Kelamin') }} <span class="text-danger">*</span></label>
            <select class="form-select" name="jk_pasien" aria-label="Default select example">
                <option selected>Jenis Kelamin</option>
                <option value="L" <?= $pasien->jk_pasien == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= $pasien->jk_pasien == 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_user" class="form-label">{{ __('Usia') }} <span class="text-danger">*</span></label>
            <input type="text" name="usia" class="form-control @error('usia') is-invalid @enderror"
                value="{{ old('usia', $pasien?->usia) }}" id="usia" placeholder="Usia">
            {!! $errors->first('usia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_user" class="form-label">{{ __('Berat Badan') }} <span class="text-danger">*</span></label>
            <input type="text" name="berat_badan" class="form-control @error('berat_badan') is-invalid @enderror"
                value="{{ old('berat_badan', $pasien?->berat_badan) }}" id="berat_badan" placeholder="Berat Badan">
            {!! $errors->first('berat_badan', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_user" class="form-label">{{ __('Tinggi Badan') }} <span class="text-danger">*</span></label>
            <input type="text" name="tinggi_badan" class="form-control @error('tinggi_badan') is-invalid @enderror"
                value="{{ old('tinggi_badan', $pasien?->tinggi_badan) }}" id="tinggi_badan" placeholder="Tinggi Badan">
            {!! $errors->first('tinggi_badan', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        <a href="{{ route('pasiens.index') }}" class="btn btn-outline-dark ms-2">Kembali</a>
    </div>
</div>
