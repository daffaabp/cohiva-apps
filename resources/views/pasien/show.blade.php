@extends('layouts.master')

@section('template_title')
    {{ $pasien->name ?? __('Show') . " " . __('Pasien') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pasien</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pasiens.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Nama Pasien:</strong>
                            {{ $pasien->nama_pasien }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Alamat Pasien:</strong>
                            {{ $pasien->alamat_pasien }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Notelpon Pasien:</strong>
                            {{ $pasien->notelpon_pasien }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Id User:</strong>
                            {{ $pasien->id_user }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Jk Pasien:</strong>
                            {{ $pasien->jk_pasien }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
