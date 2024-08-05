<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $role?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="guard_name" class="form-label">{{ __('Guard Name ') }}<span
                    style="font-size: 12px; color: red;">*(isi dengan "web")</span></label>
            <input type="text" name="guard_name" class="form-control @error('guard_name') is-invalid @enderror"
                value="{{ old('guard_name', $role?->guard_name) }}" id="guard_name" placeholder="Guard Name">
            {!! $errors->first('guard_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        @if ($permissions->isNotEmpty())
            <div class="form-group mb-2 mb20">
                <label for="permissions" class="form-label">{{ __('Permissions') }}</label>
                @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                            class="form-check-input" id="permission{{ $permission->id }}"
                            {{ in_array($permission->id, $rolePermissions ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endif



    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        <a href="{{ route('roles.index') }}" class="btn btn-outline-dark ms-2">Kembali</a>
    </div>
</div>
