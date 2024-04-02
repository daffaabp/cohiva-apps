@extends('layouts.master')

@section('template_title')
    {{ __('Create') }} Konselor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Konselor</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('konselors.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('konselor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
