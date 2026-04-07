@extends('layouts.app')
@section('title', 'User')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @include('partials.alert')
            <!-- Column Search -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">List User</h5>
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary"><i class="ti ti-plus me-1"></i>
                        Tambah User</a>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>kantor</th>
                                <th>Departemen</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->kantor->name ?? 'N/A' }}</td>
                                    <td>{{ $item->department->name ?? 'N/A' }}</td>
                                    <td>
                                        @forelse ($item->roles as $role)
                                            <li>{{ $role->name }}</li>
                                        @empty
                                            Tidak ada Role
                                        @endforelse
                                    </td>
                                    <td>
                                        @if ($item->active == 1)
                                            <span class="badge bg-label-success">Aktif</span>
                                        @else
                                            <span class="badge bg-label-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.edit', $item->uuid) }}"
                                            class="btn btn-sm btn-icon btn-warning" title="Edit"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('user.role', $item->uuid) }}"
                                            class="btn btn-sm btn-icon btn-success" title="Add Role"><i
                                                class="fa-solid fa-users"></i></a>
                                        <a href="{{ route('user.password', $item->uuid) }}"
                                            class="btn btn-sm btn-icon btn-danger" title="Edit Password">
                                            <i class="fa-solid fa-lock"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        <form id="formDeleteKantor" method="POST">
            @csrf
            @method('DELETE')
        </form>

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
