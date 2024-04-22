@extends('layouts.master')
@section('template_title')
    Reset Password
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password Konselor') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('konselors.reset-password.update', $konselor->id_konselor) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-2">
                                <label for="nama_konselor"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nama Konselor') }}</label>

                                <div class="col-md-6">
                                    <input id="nama_konselor" type="text"
                                        class="form-control" value="{{ $konselor->nama_konselor }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password Baru') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
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



