@extends('layouts.master')

@section('template_title')
    Janji Konseling
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Janji Konseling') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('janji-konselings.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Buat janji konseling') }}
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
                                        
										<th>Jadwal Konseling</th>
										<th>Pasien</th>
										<th>Status Janji</th> 
										<th>Tanggal Janji</th> 

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($janjiKonselings as $janjiKonseling)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $janjiKonseling->id_jadwalkonselor }}</td>
											<td>{{ $janjiKonseling->id_pasien }}</td>
											<td>{{ $janjiKonseling->status_janji }}</td>
											<td>{{ $janjiKonseling->tgl_janji_konseling }}</td>

                                            <td>
                                                <form action="{{ route('janji-konselings.destroy',$janjiKonseling->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('janji-konselings.show',$janjiKonseling->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('janji-konselings.edit',$janjiKonseling->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $janjiKonselings->links() !!}
            </div>
        </div>
    </div>
@endsection
