<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nama_pasien" class="form-label">{{ __('Nama Pasien') }}</label>
            <input type="text" name="nama_pasien" class="form-control @error('nama_pasien') is-invalid @enderror"
                value="{{ old('nama_pasien', $pasien?->nama_pasien) }}" id="nama_pasien" placeholder="Nama Pasien">
            {!! $errors->first('nama_pasien', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="alamat_pasien" class="form-label">{{ __('Alamat Pasien') }}</label>
            <input type="text" name="alamat_pasien" class="form-control @error('alamat_pasien') is-invalid @enderror"
                value="{{ old('alamat_pasien', $pasien?->alamat_pasien) }}" id="alamat_pasien"
                placeholder="Alamat Pasien">
            {!! $errors->first(
                'alamat_pasien',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="notelpon_pasien" class="form-label">{{ __('Notelpon Pasien') }}</label>
            <input type="text" name="notelpon_pasien"
                class="form-control @error('notelpon_pasien') is-invalid @enderror"
                value="{{ old('notelpon_pasien', $pasien?->notelpon_pasien) }}" id="notelpon_pasien"
                placeholder="Notelpon Pasien">
            {!! $errors->first(
                'notelpon_pasien',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_user" class="form-label">{{ __('Id User') }}</label>
            <input type="text" name="id_user" class="form-control @error('id_user') is-invalid @enderror"
                value="{{ old('id_user', $pasien?->id_user) }}" id="id_user" placeholder="Id User">
            {!! $errors->first('id_user', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_user" class="form-label">{{ __('Jenis Kelamin') }}</label>
            <select class="form-select" name="jk_pasien" aria-label="Default select example">
                <option selected>Jenis Kelamin</option>
                <option value="L" <?= $pasien->jk_pasien == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="P" <?= $pasien->jk_pasien == 'P' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
    </div>
</div>
