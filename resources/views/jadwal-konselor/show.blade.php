@extends('layouts.master')

@section('template_title')
    {{ $jadwalKonselor->name ?? __('Show') . " " . __('Jadwal Konselor') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Jadwal Konselor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('jadwal-konselors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Id Konselor:</strong>
                            {{ $jadwalKonselor->id_konselor }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Hari:</strong>
                            {{ $jadwalKonselor->hari }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Jam:</strong>
                            {{ $jadwalKonselor->jam }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Status:</strong>
                            {{ $jadwalKonselor->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
