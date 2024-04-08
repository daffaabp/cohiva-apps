<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_jadwalkonselor" class="form-label">Jadwal Konselor</label>
            <select name="id_jadwalkonselor" class="form-select" id="id_jadwalkonselor">
                <option value="">Budi, Selasa 11:00</option>
                <option value="">Budi, Selasa 11:00</option>
                <option value="">Budi, Selasa 11:00</option>
            </select>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_pasien" class="form-label">{{ __('Id Pasien') }}</label>
            <input type="text" name="id_pasien" class="form-control @error('id_pasien') is-invalid @enderror" value="{{ old('id_pasien', $janjiKonseling?->id_pasien) }}" id="id_pasien" placeholder="Id Pasien">
            {!! $errors->first('id_pasien', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status_janji" class="form-label">{{ __('Status Janji') }}</label>
            <input type="text" name="status_janji" class="form-control @error('status_janji') is-invalid @enderror" value="{{ old('status_janji', $janjiKonseling?->status_janji) }}" id="status_janji" placeholder="Status Janji">
            {!! $errors->first('status_janji', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="tgl_janji_konseling" class="form-label">{{ __('Tanggal Janji') }}</label>
            <input type="text" name="tgl_janji_konseling" class="form-control @error('tgl_janji_konseling') is-invalid @enderror" value="{{ old('tgl_janji_konseling', $janjiKonseling?->tgl_janji_konseling) }}" id="tgl_janji_konseling" placeholder="Tanggal Janji">
            {!! $errors->first('tgl_janji_konseling', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>