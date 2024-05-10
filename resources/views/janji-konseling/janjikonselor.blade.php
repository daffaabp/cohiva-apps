@extends('layouts.master')

@section('template_title')
    Janji Konseling
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Janji Konseling') }}
                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Janji</th>
                                        <th>Konselor</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Pasien</th>
                                        <th>Status Janji</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($janjiKonselings as $janjiKonseling)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

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
                                            <td>{{ $tgl_janji_konseling }}</td>
                                            <td>{{ $janjiKonseling->nama_konselor }}</td>
                                            <td>{{ $janjiKonseling->hari }}</td>
                                            <td>{{ $janjiKonseling->jam }}</td>
                                            <td>{{ $janjiKonseling->pasien->nama_pasien . ' | ' . $janjiKonseling->pasien->alamat_pasien }}
                                            </td>
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

                                            <td>
                                                @can('janji-konselings.show')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('janji-konselings.show', $janjiKonseling->id) }}"> <i
                                                            class="ti ti-eye"></i></a>
                                                @endcan


                                                {{-- cek jika statusnya dijadwalkan maka masih bisa dirubah atau dihapus --}}
                                                @if ($janjiKonseling->status_janji == 'DIJADWALKAN' && date('Y-m-d') <= $janjiKonseling->tgl_janji_konseling)
                                                    @can('janji-konselings.edit')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('janji-konselings.edit', $janjiKonseling->id) }}">
                                                            <i class="ti ti-pencil"></i></a>
                                                    @endcan

                                                    <form id="delete-form"
                                                        action="{{ route('janji-konselings.destroy', $janjiKonseling->id) }}"
                                                        method="POST">

                                                        @can('janji-konselings.destroy')
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                id="delete-btn"> <i class="ti ti-trash"></i></button>
                                                        @endcan

                                                    </form>
                                                @endif
                                            </td>
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
