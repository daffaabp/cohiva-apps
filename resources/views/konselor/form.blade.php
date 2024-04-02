<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nama_konselor" class="form-label">{{ __('Nama Konselor') }}</label>
            <input type="text" name="nama_konselor" class="form-control @error('nama_konselor') is-invalid @enderror" value="{{ old('nama_konselor', $konselor?->nama_konselor) }}" id="nama_konselor" placeholder="Nama Konselor">
            {!! $errors->first('nama_konselor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="notelpon_konselor" class="form-label">{{ __('Notelpon Konselor') }}</label>
            <input type="text" name="notelpon_konselor" class="form-control @error('notelpon_konselor') is-invalid @enderror" value="{{ old('notelpon_konselor', $konselor?->notelpon_konselor) }}" id="notelpon_konselor" placeholder="Notelpon Konselor">
            {!! $errors->first('notelpon_konselor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="unit_kerja" class="form-label">{{ __('Unit Kerja') }}</label>
            <input type="text" name="unit_kerja" class="form-control @error('unit_kerja') is-invalid @enderror" value="{{ old('unit_kerja', $konselor?->unit_kerja) }}" id="unit_kerja" placeholder="Unit Kerja">
            {!! $errors->first('unit_kerja', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="foto_konselor" class="form-label">{{ __('Foto Konselor') }}</label>
            <input type="text" name="foto_konselor" class="form-control @error('foto_konselor') is-invalid @enderror" value="{{ old('foto_konselor', $konselor?->foto_konselor) }}" id="foto_konselor" placeholder="Foto Konselor">
            {!! $errors->first('foto_konselor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_aktif" class="form-label">{{ __('Is Aktif') }}</label>
            <input type="text" name="is_aktif" class="form-control @error('is_aktif') is-invalid @enderror" value="{{ old('is_aktif', $konselor?->is_aktif) }}" id="is_aktif" placeholder="Is Aktif">
            {!! $errors->first('is_aktif', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
    </div>
</div>