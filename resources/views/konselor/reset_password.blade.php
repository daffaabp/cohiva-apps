@extends('layouts.master')
@section('template_title')
    Reset Password
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <span id="card_title" style="margin-right: auto;">
                                {{ __('Reset Password Konselor') }}
                            </span>
                            <div class="text-center">
                                <a href="{{ route('konselors.index') }}" class="btn btn-dark">kembali</a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('konselors.updatePassword', $konselor->id_konselor) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-2">
                                <label for="nama_konselor"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nama Konselor') }}</label>

                                <div class="col-md-6">
                                    <input id="nama_konselor" name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user?->name) }}">
                                    {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-righ">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="email"
                                        class="form-control  @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
                                    {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                </div>

                            </div>

                            <div class="form-group row mb-2">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-righ">{{ __('Username') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username', $user?->username) }}" id="username"
                                        placeholder="Username">
                                    {!! $errors->first('username', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                </div>

                            </div>

                            <div class="form-group row mb-2">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="password_confirmation">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="password_confirmation"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password Baru') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" required type="password" class="form-control"
                                        name="password_confirmation" autocomplete="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
