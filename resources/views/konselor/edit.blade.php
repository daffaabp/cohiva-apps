@extends('layouts.master')

@section('template_title')
    {{ __('Update') }} Konselor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">{{ __('Edit') }} Konselor</span>
                        <a href="{{ route('konselors.index') }}" class="btn btn-dark">kembali</a>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('konselors.update', $konselor->id_konselor) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            {{-- @include('konselor.form') --}}
                            <div class="row padding-1 p-1">
                                <div class="col-md-4">
                                    <div class="card">
                                        {{-- <img src="{{ asset('/') }}assets/images/profile/user-1.jpg" class="card-img-top" alt="avatar"> --}}
                                        @if (Storage::disk('public')->exists('foto_konselor/' . $konselor->foto_konselor) && $konselor->foto_konselor)
                                            <img style="width: 18rem;"
                                                src="{{ asset('storage/foto_konselor/' . $konselor->foto_konselor) }}"
                                                class="card-img-top" alt="avatar">
                                        @else
                                            <img src="{{ asset('/assets/images/profile/user-1.jpg') }}" class="card-img-top"
                                                alt="avatar">
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto_konselor" class="form-label">Foto Konselor</label>
                                        <input class="form-control" name="foto_konselor" type="file" id="foto_konselor">
                                        @error('foto_konselor')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-2 mb20">
                                        <label for="nama_konselor" class="form-label">{{ __('Nama Konselor') }}</label>
                                        <input type="text" name="nama_konselor"
                                            class="form-control @error('nama_konselor') is-invalid @enderror"
                                            value="{{ old('nama_konselor', $konselor?->nama_konselor) }}" id="nama_konselor"
                                            placeholder="Nama Konselor">
                                        {!! $errors->first(
                                            'nama_konselor',
                                            '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                                        ) !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="notelpon_konselor"
                                            class="form-label">{{ __('Notelpon Konselor') }}</label>
                                        <input type="text" name="notelpon_konselor"
                                            class="form-control @error('notelpon_konselor') is-invalid @enderror"
                                            value="{{ old('notelpon_konselor', $konselor?->notelpon_konselor) }}"
                                            id="notelpon_konselor" placeholder="Notelpon Konselor">
                                        {!! $errors->first(
                                            'notelpon_konselor',
                                            '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                                        ) !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="unit_kerja" class="form-label">{{ __('Unit Kerja') }}</label>
                                        <input type="text" name="unit_kerja"
                                            class="form-control @error('unit_kerja') is-invalid @enderror"
                                            value="{{ old('unit_kerja', $konselor?->unit_kerja) }}" id="unit_kerja"
                                            placeholder="Unit Kerja">
                                        {!! $errors->first('unit_kerja', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>
                                    <div class="form-group mb-2 mb20">
                                        <label for="is_aktif" class="form-label">{{ __('Is Aktif') }}</label>
                                        <div class="form-check">
                                            <input class="form-check-input" value="1"
                                                {{ $konselor->is_aktif == 1 ? 'checked' : '' }} type="radio"
                                                name="is_aktif" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Aktif
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="0"
                                                {{ $konselor->is_aktif == 0 ? 'checked' : '' }} type="radio"
                                                name="is_aktif" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Non Aktif
                                            </label>
                                        </div>
                                    </div>
                                    {{-- form untuk input ke table konselor --}}
                                </div>
                            </div>
                            @can('konselors.update')
                                <div class="col-md-12 mt20 mt-2 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-lg btn-primary">{{ __('Simpan') }}</button>
                                </div>
                            @endcan


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
