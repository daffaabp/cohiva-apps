@extends('layouts.master')

@section('template_title')
    {{ $konselor->name ?? __('Show') . ' ' . __('Konselor') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detail') }} Konselor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('konselors.index') }}"> {{ __('Kembali') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    @if (Storage::disk('public')->exists('foto_konselor/id_' . $konselor->id_konselor . '.jpg'))
                                        <img style="width: 18rem;" src="{{ asset('storage/foto_konselor/' . $konselor->foto_konselor) }}"
                                            class="card-img-top" alt="avatar">
                                    @else
                                        <img src="{{ asset('/assets/images/profile/user-1.jpg') }}" class="card-img-top"
                                            alt="avatar">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <table class="table" style="font-size: 18px">
                                    <tr>
                                        <td>Nama Konselor</td>
                                        <td>:</td>
                                        <th>{{ $konselor->nama_konselor }}</th>
                                    </tr>
                                    <tr>
                                        <td>No Telpon</td>
                                        <td>:</td>
                                        <th>{{ $konselor->notelpon_konselor }}</th>
                                    </tr>
                                    <tr>
                                        <td>Unit Kerja</td>
                                        <td>:</td>
                                        <th>{{ $konselor->unit_kerja }}</th>
                                    </tr>
                                    <tr>
                                        <td>Is Aktif</td>
                                        <td>:</td>
                                        <th>
                                            @if ($konselor->is_aktif == 1)
                                                <span class="badge text-bg-success">Aktif</span>
                                            @else
                                                <span class="badge text-bg-secondary">Non Aktif</span>
                                            @endif
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
