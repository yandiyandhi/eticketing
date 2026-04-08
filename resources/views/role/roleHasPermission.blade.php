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
                    <h5 class="modal-title">Role Permissions</h5>
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
                                    {{-- <tr>
                                        <td class="text-nowrap fw-medium text-heading">{{ $group }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-10">
                                                    <input class="form-check-input" type="checkbox" id="dashboardItEdit" />
                                                    <label class="form-check-label" for="dashboardItEdit"> IT Edit
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="dashboardHrEdit" />
                                                    <label class="form-check-label" for="dashboardHrEdit"> HR Edit
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">Kantor</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="kantorRead" />
                                                    <label class="form-check-label" for="kantorRead"> Read </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="kantorWrite" />
                                                    <label class="form-check-label" for="kantorWrite"> Write
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="kantorCreate" />
                                                    <label class="form-check-label" for="kantorCreate"> Create
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="kantorDelete" />
                                                    <label class="form-check-label" for="kantorDelete"> Delete
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">Departemen</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="departemenRead" />
                                                    <label class="form-check-label" for="departemenRead"> Read
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="departemenWrite" />
                                                    <label class="form-check-label" for="departemenWrite"> Write
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="departemenCreate" />
                                                    <label class="form-check-label" for="departemenCreate"> Create
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="departemenDelete" />
                                                    <label class="form-check-label" for="departemenDelete"> Delete
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">Kategori</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="kategoriRead" />
                                                    <label class="form-check-label" for="kategoriRead"> Read </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="kategoriWrite" />
                                                    <label class="form-check-label" for="kategoriWrite"> Write
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="kategoriCreate" />
                                                    <label class="form-check-label" for="kategoriCreate"> Create
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="kategoriDelete" />
                                                    <label class="form-check-label" for="kategoriDelete"> Delete
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">Status</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="statusRead" />
                                                    <label class="form-check-label" for="statusRead"> Read </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="statusWrite" />
                                                    <label class="form-check-label" for="statusWrite"> Write
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="statusCreate" />
                                                    <label class="form-check-label" for="statusCreate"> Create
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="statusDelete" />
                                                    <label class="form-check-label" for="statusDelete"> Delete
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">KPI</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="kpiRead" />
                                                    <label class="form-check-label" for="kpiRead"> Read </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="kpiWrite" />
                                                    <label class="form-check-label" for="kpiWrite"> Write
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="kpiCreate" />
                                                    <label class="form-check-label" for="kpiCreate"> Create
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="kpiDelete" />
                                                    <label class="form-check-label" for="kpiDelete"> Delete
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">User</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="userRead" />
                                                    <label class="form-check-label" for="userRead"> Read </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="userWrite" />
                                                    <label class="form-check-label" for="userWrite"> Write </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="userCreate" />
                                                    <label class="form-check-label" for="userCreate"> Create </label>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="userDelete" />
                                                    <label class="form-check-label" for="userDelete"> Delete </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">Request Ticketing</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="requestTicketingRead" />
                                                    <label class="form-check-label" for="requestTicketingRead"> Read
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="requestTicketingWrite" />
                                                    <label class="form-check-label" for="requestTicketingWrite"> Write
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="requestTicketingCreate" />
                                                    <label class="form-check-label" for="requestTicketingCreate"> Create
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="requestTicketingDelete" />
                                                    <label class="form-check-label" for="requestTicketingDelete"> Delete
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">Laporan</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="LaporanRead" />
                                                    <label class="form-check-label" for="LaporanRead"> Read </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="LaporanWrite" />
                                                    <label class="form-check-label" for="LaporanWrite"> Export </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">Role</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="roleRead" />
                                                    <label class="form-check-label" for="roleRead"> Read </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="roleWrite" />
                                                    <label class="form-check-label" for="roleWrite"> Write </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox" id="roleCreate" />
                                                    <label class="form-check-label" for="roleCreate"> Create </label>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="roleDelete" />
                                                    <label class="form-check-label" for="roleDelete"> Delete </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">Permissions</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="permissionsRead" />
                                                    <label class="form-check-label" for="permissionsRead"> Read </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="permissionsWrite" />
                                                    <label class="form-check-label" for="permissionsWrite"> Write </label>
                                                </div>
                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="permissionsCreate" />
                                                    <label class="form-check-label" for="permissionsCreate"> Create
                                                    </label>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="permissionsDelete" />
                                                    <label class="form-check-label" for="permissionsDelete"> Delete
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr> --}}
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
