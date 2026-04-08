@extends('layouts.app')
@section('title', 'Role Permissions')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @include('partials.alert')
            <!-- Column Search -->
            <div class="card">
                <div class="card-header">
                    <h5 class="modal-title">Role Permissions {{ $roleName ?: 'No Role' }}</h5>
                </div>
                <div class="card-body">
                    <div class="col-lg">
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($permissions as $group => $items)
                                        <tr>
                                            <td class="text-nowrap fw-medium text-heading">
                                                {{ Str::ucfirst($group) ? Str::ucfirst($group) : 'Uncategorized' }}
                                            </td>

                                            <td>
                                                <div class="d-flex flex-wrap">

                                                    @foreach ($items as $permission)
                                                        <div class="form-check mb-0 me-4 me-lg-12">

                                                            <input class="form-check-input permission-checkbox"
                                                                type="checkbox" name="permissions[]"
                                                                value="{{ $permission->id }}" id="perm{{ $permission->id }}"
                                                                data-permission="{{ $permission->name }}"
                                                                data-role="{{ $roleId }}"
                                                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} />

                                                            <label class="form-check-label" for="perm{{ $permission->id }}">
                                                                {{ ucfirst(last(explode('.', $permission->name))) }}
                                                            </label>

                                                        </div>
                                                    @endforeach

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>
                </div>
            </div>



        </div>
        {{-- @include('layouts.footercontent') --}}
    </div>
@endsection

@push('myscript')
    <script>
        $(document).ready(function() {
            $('.permission-checkbox').change(function() {
                var permission = $(this).data('permission');
                var roleId = $(this).data('role');
                var checked = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '/role/permission/' + roleId,
                    type: 'POST',
                    data: {
                        permission_name: permission,
                        checked: checked,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {

                    },
                    error: function(err) {

                    }
                });
            });
        });
    </script>
@endpush
