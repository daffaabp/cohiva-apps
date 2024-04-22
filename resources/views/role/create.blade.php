@extends('layouts.master')

@section('template_title')
    {{ __('Create') }} Role
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <span id="card_title" style="margin-right: auto;">
                                {{ __('Create Role') }}
                            </span>
                            <div class="text-center">
                                <a href="{{ route('roles.get-permissions') }}" class="btn btn-sm btn-primary">Get Permissions</a>
                                <span style="margin: 0 5px;"></span>
                                <a href="{{ route('roles.refresh-delete-permissions') }}" class="btn btn-sm btn-primary">Refresh And Delete Permissions</a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('roles.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('role.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#permissions').select2({
            placeholder: 'Choose permissions',
            allowClear: true,
            closeOnSelect: false
        });
    });
</script>
