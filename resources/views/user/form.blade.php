<div class="row padding-1 p-1">
    <div class="col-md-12">
       
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="username" class="form-label">{{ __('Username') }}</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                value="{{ old('username', $user?->username) }}" id="username" placeholder="Username">
            {!! $errors->first('username', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="isPasien" class="form-label">{{ __('Is Pasien') }}</label>
            <div class="form-check">
                <input class="form-check-input" value="1" type="radio"
                    {{ $user?->isPasien == 1 ? 'checked' : '' }} name="isPasien" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Pasien
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="0" type="radio"
                    {{ $user?->isPasien == 0 ? 'checked' : '' }} name="isPasien" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Non Pasien
                </label>
            </div>
            @error('ispasien')
                <div class="text-danger" style="font-weight: 800">{{ $errors->first('ispasien', ':message') }}</div>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                id="password" placeholder="Password">
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password_confirmation" class="form-label">{{ __('Konfirm Password') }}</label>
            <input type="password" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                placeholder="Konfirm Password">
            {!! $errors->first(
                'password_confirmation',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="role" class="form-label">{{ __('Roles') }}</label>
            @foreach ($roles as $r)
                <div class="form-check">
                    <input class="form-check-input" value="{{ $r->name }}" type="radio" name="role"
                        id="{{ $r->name }}">
                    <label class="form-check-label" for="{{ $r->name }}">
                        {{ $r->name }}
                    </label>
                </div>
            @endforeach
            @error('role')
                <div class="text-danger" style="font-weight: 800">{{ $errors->first('role', ':message') }}</div>
            @enderror
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        <a href="{{ route('users.index') }}" class="btn btn-outline-dark ms-2">kembali</a>
    </div>
</div>
