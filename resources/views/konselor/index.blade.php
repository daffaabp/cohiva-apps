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
                                <a href="{{ route('konselors.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Tambah Konselor') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
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

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konselors as $konselor)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $konselor->nama_konselor }}</td>
                                            <td>{{ $konselor->notelpon_konselor }}</td>
                                            <td>{{ $konselor->unit_kerja }}</td>
                                            <td>
                                                @if ($konselor->is_aktif == 1)
                                                    <span class="badge text-bg-success">Aktif</span>
                                                @else
                                                    <span class="badge text-bg-secondary">Non Aktif</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('konselors.destroy', encrypt($konselor->id_konselor)) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('konselors.show', encrypt($konselor->id_konselor)) }}"><i
                                                            class="ti ti-eye"></i></a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('konselors.edit', encrypt($konselor->id_konselor)) }}"><i
                                                            class="ti ti-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin hapus data?')"><i
                                                            class="ti ti-trash"></i> </button>
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
