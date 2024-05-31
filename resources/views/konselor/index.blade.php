@extends('layouts.master')

@section('template_title')
    Konselor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Konselor') }}
                            </span>

                            <div class="float-right">
                                @can('konselors.createuser')
                                    <a href="{{ route('konselors.createuser') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Tambah Konselor') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Konselor</th>
                                        <th>Notelpon Konselor</th>
                                        <th>Unit Kerja</th>
                                        <th>Is Aktif</th>
                                        <th>Reset Password</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konselors as $konselor)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $konselor->nama_konselor }}</td>

                                            @if ($konselor->notelpon_konselor)
                                                <td>{{ $konselor->notelpon_konselor }}</td>
                                            @else
                                                <td>-</td>
                                            @endif

                                            <td>{{ $konselor->unit_kerja }}</td>
                                            <td>
                                                @if ($konselor->is_aktif == 1)
                                                    <span class="badge text-bg-success">Aktif</span>
                                                @else
                                                    <span class="badge text-bg-danger">Non Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                @can('konselors.showResetPasswordForm')
                                                    <a href="{{ route('konselors.showResetPasswordForm', $konselor->id_konselor) }}"
                                                        class="btn btn-warning btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin akan melakukan reset password konselor atas nama {{ $konselor->nama_konselor }}?')">
                                                        <i class="ti ti-lock"></i> Reset Password
                                                    </a>
                                                @endcan
                                            </td>


                                            <td>
                                                <form
                                                    action="{{ route('konselors.destroy', encrypt($konselor->id_konselor)) }}"
                                                    method="POST">

                                                    @can('konselors.show')
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('konselors.show', encrypt($konselor->id_konselor)) }}"><i
                                                                class="ti ti-eye"></i></a>
                                                    @endcan

                                                    @can('konselors.edit')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('konselors.edit', encrypt($konselor->id_konselor)) }}"><i
                                                                class="ti ti-pencil"></i></a>
                                                    @endcan

                                                    @can('konselors.destroy')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Yakin ingin hapus data?')"><i
                                                                class="ti ti-trash"></i> </button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $konselors->links() !!}
            </div>
        </div>
    </div>
@endsection
