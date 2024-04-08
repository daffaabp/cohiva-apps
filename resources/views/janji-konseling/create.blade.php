@extends('layouts.master')

@section('template_title')
    {{ __('Create') }} Janji Konseling
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Tambah') }} Janji Konseling</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('janji-konselings.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('janji-konseling.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
