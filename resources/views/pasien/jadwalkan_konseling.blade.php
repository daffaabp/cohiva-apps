@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Card 1: Chat -->
            <div class="col-md-4">
                <div class="card card-chat">
                    <div class="card-header bg-success text-white">
                        <h3 class="card-title"><i class="fas fa-comments me-2"></i>Chat via WhatsApp</h3>
                    </div>
                    <div class="card-body d-grid">
                        <p>Silahkan klik tombol dibawah ini untuk konsultasi dengan Admin :</p>
                        <a href="https://wa.me/6281225011283?text=Halo%2C%20saya%20ingin%20berkonsultasi%20via%20Chat%20WhatsApp.%0ANama%20%3A%0AUmur%20%3A%0AAlamat%20%3A%0AKeluhan%20%3A"
                            class="btn btn-success btn-lg btn-block">
                            <i class="fab fa-whatsapp me-2"></i>Chat via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Video Call -->
            <div class="col-md-4">
                <div class="card card-video">
                    <div class="card-header bg-danger text-white">
                        <h3 class="card-title"><i class="fas fa-video me-2"></i>Video Call via WhatsApp</h3>
                    </div>
                    <div class="card-body d-grid">
                        <p>Silahkan klik tombol dibawah ini untuk konsultasi dengan Admin :</p>
                        <a href="https://wa.me/6281225011283?text=Halo%2C%20saya%20ingin%20berkonsultasi%20via%20Video%20Call%20WhatsApp.%0ANama%20%3A%0AUmur%20%3A%0AAlamat%20%3A%0AKeluhan%20%3A"
                            class="btn btn-danger btn-lg btn-block">
                            <i class="fab fa-whatsapp me-2"></i>Video Call via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Telpon -->
            <div class="col-md-4">
                <div class="card card-telpon">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title"><i class="fas fa-phone me-2"></i>Telpon via WhatsApp</h3>
                    </div>
                    <div class="card-body d-grid">
                        <p>Silahkan klik tombol dibawah ini untuk konsultasi dengan Admin :</p>
                        <a href="https://wa.me/6281225011283?text=Halo%2C%20saya%20ingin%20berkonsultasi%20via%20Telpon%20WhatsApp.%0ANama%20%3A%0AUmur%20%3A%0AAlamat%20%3A%0AKeluhan%20%3A"
                            class="btn btn-primary btn-lg btn-block">
                            <i class="fab fa-whatsapp me-2"></i>Telpon via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection
