@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($konselors as $konselor)
                <div class="col">
                    <div class="card h-100 bg-light">
                        <div class="position-relative">
                            @if (Storage::disk('public')->exists('foto_konselor/id_' . $konselor->id_konselor . '.jpg'))
                                <img src="{{ asset('storage/foto_konselor/' . $konselor->foto_konselor) }}"
                                    class="card-img-top rounded-circle mx-auto d-block mt-3"
                                    style="width: 220px; height: 220px; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);"
                                    alt="Profile Image">
                            @else
                                <img src="{{ asset('/assets/images/profile/user-1.jpg') }}" class="card-img-top"
                                    alt="avatar">
                            @endif
                        </div>
                        <div class="card-body bg-light text-center">
                            <h4 class="card-title font-weight-bold">{{ $konselor->nama_konselor }}</h4>
                            <p class="card-text">Unit Kerja : {{ $konselor->unit_kerja }}</p>
                            {{-- <p class="card-text" style="margin-top: -10px;"><small class="text-muted">Alamat : 123
                                Street Name, City,
                                Country</small></p> --}}
                            <a class="card-text text-center" href="https://wa.me/628123456789" target="_blank"><i
                                    class="bi bi-whatsapp dark"></i></a>
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
