@extends('layouts.master')

@section('template_title')
    {{ $janjiKonseling->name ?? __('Show') . " " . __('Janji Konseling') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Janji Konseling</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('janji-konselings.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Id Jadwalkonselor:</strong>
                            {{ $janjiKonseling->id_jadwalkonselor }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Id Pasien:</strong>
                            {{ $janjiKonseling->id_pasien }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Status Janji:</strong>
                            {{ $janjiKonseling->status_janji }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Tanggal Janji:</strong>
                            {{ $janjiKonseling->tgl_janji_konseling }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
