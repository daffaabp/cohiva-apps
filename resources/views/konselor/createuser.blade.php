@extends('layouts.master')

@section('template_title')
    Buat User Konselor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Buat User Konselor</span>
                        <a href="{{ route('konselors.index') }}" class="btn btn-dark">kembali</a>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('konselors.storeusers') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row padding-1 p-1">
                                <div class="col-md-12">
                                    {{-- form untuk input ke table user --}}
                                    <div class="form-group mb-2 mb20">
                                        <label for="name" class="form-label">{{ __('Nama') }}</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $user?->name) }}" id="name" placeholder="Nama">
                                        {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="username" class="form-label">{{ __('Username') }}</label>
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            value="{{ old('username', $user?->username) }}" id="username"
                                            placeholder="Username">
                                        <div id="username" class="form-text"><span class="text-danger">*</span>silahkan isi
                                            username tanpa spasi dan hanya huruf kecil</div>

                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
                                        {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            placeholder="Password">
                                        {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="password_confirmation"
                                            class="form-label">{{ __('Konfirm Password') }}</label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation" placeholder="Konfirm Password">
                                        {!! $errors->first(
                                            'password_confirmation',
                                            '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                                        ) !!}
                                    </div>
                                </div>
                            </div>
                            @can('konselors.storeusers')
                                <div class="col-md-12 mt20 mt-2 d-flex justify-content-start">
                                    <button type="submit" class="btn btn-lg btn-primary">{{ __('Lanjutkan') }}</button>
                                </div>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
