<div class="row padding-1 p-1">
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p>{{ $message }}.</p><a href="{{ route('jadwal-konselors.show', encrypt(Session::get('id'))) }}"
                class="text-danger"><strong class="ms-1">lihat</strong></a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="id_konselor" class="form-label">Konselor</label>
            {{-- set agar ketika update hanya bisa merubah hari, jam, dan status --}}
            @if ($jadwalKonselor->id_konselor)
                <select name="id_konselor" id="id_konselor" class="form-select" @readonly(true)>
                    <option value="{{ $jadwalKonselor->id_konselor }}">{{ $jadwalKonselor->konselor->nama_konselor }}
                    </option>
                </select>
            @else
                <select name="id_konselor"
                    class="form-select js-example-basic-single @error('id_konselor') is-invalid @enderror"
                    id="id_konselor">
                    <option value="">Silahkan pilih</option>
                    @foreach ($konselor as $row)
                        <option {{ $row->id_konselor == $jadwalKonselor->id_konselor ? 'selected' : '' }}
                            value="{{ $row->id_konselor }}">{{ $row->nama_konselor }}</option>
                    @endforeach
                </select>
            @endif
            {!! $errors->first('id_konselor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="hari" class="form-label">Hari</label>
            <select name="hari" class="form-select @error('hari') is-invalid @enderror" id="hari">
                <option @if ($jadwalKonselor->hari == 'Senin') selected @endif value="Senin">Senin</option>
                <option @if ($jadwalKonselor->hari == 'Selasa') selected @endif value="Selasa">Selasa</option>
                <option @if ($jadwalKonselor->hari == 'Rabu') selected @endif value="Rabu">Rabu</option>
                <option @if ($jadwalKonselor->hari == 'Kamis') selected @endif value="Kamis">Kamis</option>
                <option @if ($jadwalKonselor->hari == 'Jumat') selected @endif value="Jumat">Jumat</option>
                <option @if ($jadwalKonselor->hari == 'Sabtu') selected @endif value="Sabtu">Sabtu</option>
                <option @if ($jadwalKonselor->hari == 'Minggu') selected @endif value="Minggu">Minggu</option>
            </select>
            {!! $errors->first('hari', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="jam" class="form-label">{{ __('Jam') }}</label>
            <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror"
                value="{{ old('jam', $jadwalKonselor?->jam) }}" id="jam" placeholder="Jam">
            {!! $errors->first('jam', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                @isset($jadwalKonselor->status)
                    <option value="1" @if ($jadwalKonselor->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if ($jadwalKonselor->status == 0) selected @endif>Non Aktif</option>
                @else
                    <option value="1">Aktif</option>
                    <option value="0">Non Aktif</option>
                @endisset
            </select>
            {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        @canany(['jadwal-konselors.store', 'jadwal-konselors.update'])
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        @endcanany
        <a href="{{ route('jadwal-konselors.index') }}" class="btn btn-outline-dark ms-2">Kembali</a>
    </div>
</div>
