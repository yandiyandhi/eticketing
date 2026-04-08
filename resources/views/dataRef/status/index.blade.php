@extends('layouts.app')
@section('title', 'Status')
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
                    <h5 class="mb-0">List Status</h5>
                    @can('status.create')
                        <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddStatus"><i
                                class="ti ti-plus me-1"></i> Tambah Status</a>
                    @else
                        <a href="#" class="btn btn-sm btn-secondary" @disabled(true)>
                            <i class="ti ti-plus me-1"></i> Tambah Status</a>
                    @endcan
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($status as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        @can('status.edit')
                                            <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-warning"
                                                data-bs-toggle="modal" data-bs-target="#modalEditStatus"
                                                data-id="{{ $item->uuid }}" data-name="{{ $item->name }}" title="Edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        @else
                                            <a href="#" class="btn btn-sm btn-icon btn-secondary"
                                                @disabled(true)>
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        @endcan
                                        @can('status.delete')
                                            <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger deleteStatus"
                                                data-id="{{ $item->uuid }}" data-name="{{ $item->name }}" title="Hapus"
                                                id="confirm-text">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-sm btn-icon btn-secondary"
                                                @disabled(true)>
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        <form id="formDeleteStatus" method="POST">
            @csrf
            @method('DELETE')
        </form>

        @include('dataRef.status.addStatus')
        @include('dataRef.status.editStatus')

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
