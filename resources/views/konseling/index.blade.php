@extends('layouts.master')

@section('template_title')
    Konseling
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">

                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Tgl Konseling</th>
                                        <th>Pasien</th>
                                        <th>Status Pasien</th>
                                        <th>Konselor</th>
                                        <th>Status Konseling</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konselings as $konseling)
                                        <?php
                                        if ($konseling['tgl_konseling'] != null) {
                                            $tanggal = date('j', strtotime($konseling['tgl_konseling']));
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

                                            $bl = date('n', strtotime($konseling['tgl_konseling']));
                                            $bulan = $bulan_array[$bl];
                                            $tahun = date('Y', strtotime($konseling['tgl_konseling']));
                                            $tgl_konseling = $tanggal . ' ' . ' ' . $bulan . ' ' . $tahun;
                                        } else {
                                            $tgl_konseling = '';
                                        }
                                        ?>
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $tgl_konseling }}</td>
                                            <td>{{ $konseling->pasien->nama_pasien }}</td>
                                            <td>{{ $konseling->status_pasien }}</td>
                                            <td>{{ $konseling->konselor->nama_konselor }}</td>
                                            <td>
                                                @if ($konseling->status_konseling == 'Selesai')
                                                    <span class="badge text-bg-success">Selesai</span>
                                                @else
                                                    <span class="badge text-bg-warning">Membutuhkan Tindak Lanjut</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form id="delete-form"
                                                    action="{{ route('konselings.destroy', $konseling->id_konseling) }}"
                                                    method="POST">
                                                    @can('konselings.show')
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('konselings.show', $konseling->id_konseling) }}"><i
                                                                class="ti ti-eye"></i></a>
                                                    @endcan
                                                    @can('konselings.edit')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('konselings.edit', $konseling->id_konseling) }}"><i
                                                                class="ti ti-pencil"></i></a>
                                                    @endcan
                                                    @can('konselings.destroy')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data?')"><i
                                                                class="ti ti-trash"></i></button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $konselings->links() !!}
            </div>
        </div>
    </div>
@endsection
