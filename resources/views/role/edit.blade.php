@extends('layouts.master')

@section('template_title')
    {{ __('Update') }} Role
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <span id="card_title" style="margin-right: auto;">
                                {{ __('Update Role') }}
                            </span>
                            <div class="text-center">
                                @can('roles.get-permissions')
                                    <a href="{{ route('roles.get-permissions') }}" class="btn btn-sm btn-primary">Get
                                        Permissions</a>
                                @endcan

                                <span style="margin: 0 5px;"></span>

                                @can('roles.refresh-delete-permissions')
                                    <a href="{{ route('roles.refresh-delete-permissions') }}"
                                        class="btn btn-sm btn-primary">Refresh And Delete Permissions</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('roles.update', $role->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('role.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
