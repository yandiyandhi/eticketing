@extends('layouts.app')
@section('title', 'Department')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Column Search -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">List Departemen</h5>
                    <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAddDepartment"><i class="ti ti-plus me-1"></i> Tambah Departemen</a>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>UUID</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->uuid }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalEditDepartment" data-id="{{ $item->uuid }}"
                                            data-name="{{ $item->name }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)"
                                            class="btn btn-sm btn-icon btn-danger deleteDepartment"
                                            data-id="{{ $item->uuid }}" data-name="{{ $item->name }}"
                                            title="Hapus" id="confirm-text">
                                            <i class="fa-solid fa-trash"></i>
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
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        <form id="formDeleteDepartment" method="POST">
            @csrf
            @method('DELETE')
        </form>

        @include('dataRef.dept.addDept');
        @include('dataRef.dept.editDept');

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
