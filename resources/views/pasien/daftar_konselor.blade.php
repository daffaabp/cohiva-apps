@extends('layouts.master')
@section('template_title')
    Daftar Konselor
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($konselors as $konselor)
                <div class="col">
                    <div class="card h-100 bg-light">
                        <div class="position-relative">
                            @if (Storage::disk('public')->exists('foto_konselor/' . $konselor->foto_konselor) && $konselor->foto_konselor)
                               <img src="{{ asset('public/foto_konselor/' . $konselor->foto_konselor) }}"
                                    class="card-img-top rounded-circle mx-auto d-block mt-3"
                                    style="width: 220px; height: 220px; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);"
                                    alt="Profile Image">
                            @else
                                <img src="{{ asset('/assets/images/profile/user-1.jpg') }}"
                                    class="card-img-top rounded-circle mx-auto d-block mt-3"
                                    style="width: 220px; height: 220px; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);"
                                    alt="avatar">
                            @endif

                        </div>
                        <div class="card-body bg-light text-center">
                            <h4 class="card-title font-weight-bold">{{ $konselor->nama_konselor }}</h4>
                            <p class="card-text">Unit Kerja : {{ $konselor->unit_kerja }}</p>
                            @if (!empty($konselor->notelpon_konselor))
                                <p class="card-text text-center font-weight-bold">
                                    <i class="fab fa-whatsapp fa-lg"></i> : {{ $konselor->notelpon_konselor }}
                                </p>
                            @endif

                            {{-- Tambahkan bagian jadwal konseling --}}
                            {{-- @forelse ($konselor->jadwalKonselors as $jadwal)
                                <p>
                                    {{ $jadwal->hari }} - {{ $jadwal->jam }} ({{ $jadwal->status }})
                                </p>
                            @empty
                                <p>Jadwal belum tersedia.</p>
                            @endforelse --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .card:hover {
            transform: scale(1.05);
            transition: transform .5s ease;
        }
    </style>
@endsection
