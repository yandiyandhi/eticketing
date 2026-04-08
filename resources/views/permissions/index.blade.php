@extends('layouts.app')
@section('title', 'Permission')
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
                    <h5 class="mb-0">List Permission</h5>
                    <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAddPermission"><i class="ti ti-plus me-1"></i>Tambah Permission</a>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permissions as $item)
                                <tr>
                                    <td>{{ $permissions->firstItem() + $loop->index }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('permission.edit', ['id' => $item->id]) }}"
                                            class="btn btn-sm btn-icon btn-warning"title="Edit"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger deleteRole"
                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}" title="Hapus"
                                            id="confirm-text">
                                            <i class="fa-solid fa-trash"></i>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-footer">
                        {{ $permissions->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        <form id="formDeletePermission" method="POST">
            @csrf
            @method('DELETE')
        </form>

        @include('permissions.createPermission')

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
