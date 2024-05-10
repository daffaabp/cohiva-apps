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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Jumlah Konseling</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rekapkonselings as $rekapkonseling)
                                        
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $rekapkonseling->jml_konseling }}</td>
                                            <td>{{ $rekapkonseling->rekap_bln }}</td>
                                            <td>{{ $rekapkonseling->rekap_tahun }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
