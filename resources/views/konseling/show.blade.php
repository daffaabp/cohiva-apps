@extends('layouts.master')

@section('template_title')
    {{ $konseling->name ?? __('Show') . ' ' . __('Konseling') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detail') }} Konseling</span>
                        </div>
                        <div class="float-right">
                            @can('konselings.index')
                                <a class="btn btn-primary btn-sm" href="{{ route('konselings.index') }}"> {{ __('Kembali') }}</a>
                            @endcan

                            @hasanyrole('Konselor')
                                @can('konselings.konselingbykonselor')
                                    <a class="btn btn-primary btn-sm" href="{{ route('konselings.konselingbykonselor') }}">
                                        {{ __('Kembali') }}</a>
                                @endcan
                            @endhasanyrole
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <table class="table">
                            <tr>
                                <th style="width: 200px; vertical-align: top;">Tanggal Konseling</th>
                                <th style="width: 30px; vertical-align: top;">:</th>
                                <td>{{ $konseling->tgl_konseling }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px; vertical-align: top;">Pasien</th>
                                <th style="width: 30px; vertical-align: top;">:</th>
                                <td>{{ $konseling->pasien->nama_pasien }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px; vertical-align: top;">Konselor</th>
                                <th style="width: 30px; vertical-align: top;">:</th>
                                <td>{{ $konseling->konselor->nama_konselor }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px; vertical-align: top;">Status Pasien</th>
                                <th style="width: 30px; vertical-align: top;">:</th>
                                <td>{{ $konseling->status_pasien }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px; vertical-align: top;">Penilaian</th>
                                <th style="width: 30px; vertical-align: top;">:</th>
                                <td>{{ $konseling->penilaian }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px; vertical-align: top;">Keluhan</th>
                                <th style="width: 30px; vertical-align: top;">:</th>
                                <td>{{ $konseling->keluhan }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px; vertical-align: top;">Jenis Konseling</th>
                                <th style="width: 30px; vertical-align: top;">:</th>
                                <td>{{ $konseling->jenis_konseling }}</td>
                            </tr>
                            <tr>
                                <th style="width: 200px; vertical-align: top;">Status Konseling</th>
                                <th style="width: 30px; vertical-align: top;">:</th>
                                <td>
                                    @if ($konseling->status_konseling == 'Selesai')
                                        <span class="badge text-bg-success">Selesai</span>
                                    @else
                                        <span class="badge text-bg-warning">Membutuhkan Tindak Lanjut</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 200px; vertical-align: top;">Keterangan</th>
                                <th style="width: 30px; vertical-align: top;">:</th>
                                <td>{{ $konseling->keterangan }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
