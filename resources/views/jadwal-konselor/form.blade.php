<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_konselor" class="form-label">Konselor</label>
            <select name="id_konselor" class="form-select" id="id_konselor">
                @foreach($konselor as $row)
                <option {{ $row->id_konselor == $jadwalKonselor->id_konselor ? 'selected' : ''; }} value="{{ $row->id_konselor }}">{{ $row->nama_konselor }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="hari" class="form-label">Hari</label>
            <select name="hari" class="form-select" id="hari">
                <option @if($jadwalKonselor->hari == 'Senin') selected @endif value="Senin">Senin</option>
                <option @if($jadwalKonselor->hari == 'Selasa') selected @endif value="Selasa">Selasa</option>
                <option @if($jadwalKonselor->hari == 'Rabu') selected @endif value="Rabu">Rabu</option>
                <option @if($jadwalKonselor->hari == 'Kamis') selected @endif value="Kamis">Kamis</option>
                <option @if($jadwalKonselor->hari == 'Jumat') selected @endif value="Jumat">Jumat</option>
                <option @if($jadwalKonselor->hari == 'Sabtu') selected @endif value="Sabtu">Sabtu</option>
                <option @if($jadwalKonselor->hari == 'Minggu') selected @endif value="Minggu">Minggu</option>
            </select>
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="jam" class="form-label">{{ __('Jam') }}</label>
            <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" value="{{ old('jam', $jadwalKonselor?->jam) }}" id="jam" placeholder="Jam">
            {!! $errors->first('jam', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="1">Aktif</option>
                <option value="0">Non Aktif</option>
            </select>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        <a href="{{ route('jadwal-konselors.index') }}" class="btn btn-outline-dark ms-2">Kembali</a>
    </div>
</div>