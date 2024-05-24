@extends('layouts.master')

@section('template_title')
    Rekap Konseling
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Rekap konseling
                            </span>

                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="month" name="filter_bln" value="value="{{ request('filter_bln') }}" class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary"><i class="ti ti-filter"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th class="text-center">Jumlah Konseling</th>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Tahun</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($rekapkonselings)
                                        @foreach ($rekapkonselings as $rekapkonseling)
                                            <?php
                                            if ($rekapkonseling->rekap_bln != null) {
                                                $bulan_array = [
                                                    1 => 'Januari',
                                                    2 => 'Februari',
                                                    3 => 'Maret',
                                                    4 => 'April',
                                                    5 => 'Mei',
                                                    6 => 'Juni',
                                                    7 => 'Juli',
                                                    8 => 'Agustus',
                                                    9 => 'September',
                                                    10 => 'Oktober',
                                                    11 => 'November',
                                                    12 => 'Desember',
                                                ];
                                            
                                                $bulan = $bulan_array[$rekapkonseling->rekap_bln];
                                                $rekap_bln = $bulan;
                                            } else {
                                                $rekap_bln = '';
                                            }
                                            ?>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td class="text-center">{{ $rekapkonseling->jml_konseling }}</td>
                                                <td class="text-center">{{ $rekap_bln }}</td>
                                                <td class="text-center">{{ $rekapkonseling->rekap_tahun }}</td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">Data tidak ditemukan</td>
                                        </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
