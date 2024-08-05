@extends('layouts.master')

@section('template_title')
    Pilih Konselor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Pilih Konselor</span>
                    </div>
                    <div class="card-body bg-white">
                        <form action="" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="id_konselor" class="form-label">Konselor</label>
                                <select name="id_konselor" class="form-select js-example-basic-single" id="id_konselor">
                                    @foreach ($konselors as $konselor)
                                        <option value="{{ $konselor->id_konselor }}">{{ $konselor->nama_konselor }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary mt-4">Lanjutkan</button>
                                <a href="{{ route('janji-konselings.index') }}" class="btn btn-outline-dark mt-4 ms-2">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
