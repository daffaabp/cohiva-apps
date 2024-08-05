@extends('layouts.master')

@section('template_title')
    {{ __('Create') }} Konseling
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Input') }} hasil konseling pasien : {{ $janjiKonseling->pasien->nama_pasien }}</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('konselings.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id_janjikonseling" value="{{ $janjiKonseling->id }}">
                            @include('konseling.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
