@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <div class="col">
                <div class="card h-100 bg-light">
                    <div class="position-relative">
                        <img src="{{ URL::to('./assets/images/fotos/daffa3.png') }}"
                            class="card-img-top rounded-circle mx-auto d-block mt-3"
                            style="width: 220px; height: 220px; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);"
                            alt="Profile Image">
                    </div>
                    <div class="card-body bg-light text-center">
                        <h4 class="card-title font-weight-bold">Daffa Budi Prasetya</h4>
                        <p class="card-text">Unit Kerja : Puskesma Cilacap Tengah 1</p>
                        <p class="card-text" style="margin-top: -10px;"><small class="text-muted">Alamat : 123
                                Street Name, City,
                                Country</small></p>
                        <a class="card-text text-center" href="https://wa.me/628123456789" target="_blank"><i
                                class="bi bi-whatsapp dark"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card:hover {
            transform: scale(1.05);
            transition: transform .5s ease;
        }
    </style>
@endsection
