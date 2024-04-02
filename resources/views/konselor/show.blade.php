@extends('layouts.app')

@section('template_title')
    {{ $konselor->name ?? __('Show') . " " . __('Konselor') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Konselor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('konselors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Id Konselor:</strong>
                            {{ $konselor->id_konselor }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nama Konselor:</strong>
                            {{ $konselor->nama_konselor }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Notelpon Konselor:</strong>
                            {{ $konselor->notelpon_konselor }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Unit Kerja:</strong>
                            {{ $konselor->unit_kerja }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Foto Konselor:</strong>
                            {{ $konselor->foto_konselor }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Is Aktif:</strong>
                            {{ $konselor->is_aktif }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
