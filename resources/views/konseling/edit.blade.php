@extends('layouts.master')

@section('template_title')
    {{ __('Update') }} Konseling
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Perbarui hasil konseling') }} pasien: {{ $konseling->pasien->nama_pasien }}</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('konselings.update', $konseling->id_konseling) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <input type="hidden" name="id_janjikonseling" value="{{ $konseling->id_janjikonseling }}">
                            @include('konseling.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
