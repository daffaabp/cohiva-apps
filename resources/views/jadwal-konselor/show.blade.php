@extends('layouts.master')

@section('template_title')
    {{ $jadwalKonselor->name ?? __('Show') . ' ' . __('Jadwal Konselor') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detail') }} Jadwal Konselor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('jadwal-konselors.index') }}">
                                {{ __('Kembali') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <table class="table">
                            <tr>
                                <th style="width: 150px;">Konselor</th>
                                <th style="width: 30px;">:</th>
                                <td>{{ $jadwalKonselor->konselor->nama_konselor }}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px;">Hari</th>
                                <th style="width: 30px;">:</th>
                                <td>{{ $jadwalKonselor->hari }}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px;">Jam</th>
                                <th style="width: 30px;">:</th>
                                <td>{{ $jadwalKonselor->jam }}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px;">Status</th>
                                <th style="width: 30px;">:</th>
                                <td>
                                    @if ($jadwalKonselor->status == 1)
                                        <span class="badge text-bg-success">Aktif</span>
                                    @else
                                        <span class="badge text-bg-dark">Non Aktif</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
