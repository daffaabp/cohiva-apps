@extends('layouts.master')

@section('template_title')
    Jadwal Konselor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Jadwal Konselor') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('jadwal-konselors.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Tambah Jadwal') }}
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
                                        
										<th>Konselor</th>
										<th>Hari</th>
										<th>Jam</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwalKonselors as $jadwalKonselor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $jadwalKonselor->konselor->nama_konselor }}</td>
											<td>{{ $jadwalKonselor->hari }}</td>
											<td>{{ $jadwalKonselor->jam }}</td>
											<td>
                                            @if($jadwalKonselor->status == 1)
                                            <span class="badge text-bg-success">Aktif</span>
                                            @else
                                            <span class="badge text-bg-dark">Non Aktif</span>
                                            @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('jadwal-konselors.destroy',encrypt($jadwalKonselor->id)) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('jadwal-konselors.show',encrypt($jadwalKonselor->id)) }}"><i class="fa fa-fw fa-eye"></i> <i class="ti ti-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('jadwal-konselors.edit',encrypt($jadwalKonselor->id)) }}"><i class="fa fa-fw fa-edit"></i> <i class="ti ti-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data?')"><i class="ti ti-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $jadwalKonselors->links() !!}
            </div>
        </div>
    </div>
@endsection
