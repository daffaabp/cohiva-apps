@extends('layouts.master')

@section('template_title')
    Pasien
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pasien') }}
                            </span>

                             {{-- <div class="float-right">
                                <a href="{{ route('pasiens.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Tambah Pasien') }}
                                </a>
                              </div> --}}
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
                                        
										<th>Nama Pasien</th>
										<th>Alamat Pasien</th>
										<th>Notelpon Pasien</th>
										<th>Jenis kelamin Pasien</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasiens as $pasien)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pasien->nama_pasien }}</td>
											<td>{{ $pasien->alamat_pasien }}</td>
											<td>{{ $pasien->notelpon_pasien }}</td>
											<td>
                                                @if($pasien->jk_pasien == 'L')
                                                {{ 'Laki-laki' }}
                                                @else
                                                {{ 'Perempuan' }}
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('pasiens.destroy',$pasien->id_pasien) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pasiens.show',$pasien->id_pasien) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pasiens.edit',$pasien->id_pasien) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data?')"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button> --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pasiens->links() !!}
            </div>
        </div>
    </div>
@endsection
