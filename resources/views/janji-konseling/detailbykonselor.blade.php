@extends('layouts.master')

@section('template_title')
    {{ $janjiKonseling->name ?? __('Show') . ' ' . __('Janji Konseling') }}
@endsection

@push('custom-css')
    <style>
        .judul{
            width: 150px;
        }
        .titikdua{
            width: 50px;
        }
    </style>
@endpush

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detail') }} Janji Konseling</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('janji-konselings.index') }}">
                                {{ __('Kembali') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <?php
                        if ($janjiKonseling['tgl_janji_konseling'] != null) {
                            $tanggal = date('j', strtotime($janjiKonseling['tgl_janji_konseling']));
                            $bulan_array = [
                                1 => 'Jan',
                                2 => 'Feb',
                                3 => 'Mar',
                                4 => 'Apr',
                                5 => 'Mei',
                                6 => 'Jun',
                                7 => 'Jul',
                                8 => 'Ags',
                                9 => 'Sep',
                                10 => 'Okt',
                                11 => 'Nov',
                                12 => 'Des',
                            ];
                        
                            $bl = date('n', strtotime($janjiKonseling['tgl_janji_konseling']));
                            $bulan = $bulan_array[$bl];
                            $tahun = date('Y', strtotime($janjiKonseling['tgl_janji_konseling']));
                            $tgl_janji_konseling = $tanggal . ' ' . ' ' . $bulan . ' ' . $tahun;
                        } else {
                            $tgl_janji_konseling = '';
                        }
                        ?>
                        <table class="table">
                            <tr>
                                <th class="judul">
                                    Tanggal Janji
                                </th>
                                <td class="titikdua">:</td>
                                <td>
                                    {{ $tgl_janji_konseling }}
                                </td>
                            </tr>
                            <tr>
                                <th class="judul">
                                    Nama Pasien
                                </th>
                                <td class="titikdua">:</td>
                                <td>
                                    {{ $janjiKonseling->pasien->nama_pasien }}
                                </td>
                            </tr>
                            <tr>
                                <th class="judul">
                                    Alamat Pasien
                                </th>
                                <td class="titikdua">:</td>
                                <td>
                                    {{ $janjiKonseling->pasien->alamat_pasien }}
                                </td>
                            </tr>
                            <tr>
                                <th class="judul">
                                    Konselor
                                </th>
                                <td class="titikdua">:</td>
                                <td>
                                    {{ $janjiKonseling->nama_konselor }}
                                </td>
                            </tr>
                            <tr>
                                <th class="judul">
                                    Hari
                                </th>
                                <td class="titikdua">:</td>
                                <td>
                                    {{ $janjiKonseling->hari }}
                                </td>
                            </tr>
                            <tr>
                                <th class="judul">
                                    Jam
                                </th>
                                <td class="titikdua">:</td>
                                <td>
                                    {{ $janjiKonseling->jam }}
                                </td>
                            </tr>
                            <tr>
                                <th class="judul">
                                    Status Janji
                                </th>
                                <td class="titikdua">:</td>
                                <td>
                                    @if ($janjiKonseling->status_janji == 'DIJADWALKAN')
                                        <span
                                            class="badge rounded-pill text-bg-primary">{{ $janjiKonseling->status_janji }}</span>
                                    @elseif($janjiKonseling->status_janji == 'TERLAKSANA')
                                        <span
                                            class="badge rounded-pill text-bg-success">{{ $janjiKonseling->status_janji }}</span>
                                    @elseif($janjiKonseling->status_janji == 'DIBATALKAN')
                                        <span
                                            class="badge rounded-pill text-bg-danger">{{ $janjiKonseling->status_janji }}</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <div class="col-md-12 d-flex justify-content-end">
                            <a href="{{ route('konselings.create', $janjiKonseling->id) }}" class="btn btn-success">Input hasil konseling</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
