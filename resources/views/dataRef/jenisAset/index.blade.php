@extends('layouts.app')
@section('title', 'Jenis Aset')
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
                    <h5 class="mb-0">List Jenis Aset</h5>
                    <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAddJenisAset"><i class="ti ti-plus me-1"></i> Tambah Jenis Aset</a>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
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
                            @forelse ($jensiAset as $item)
                                <tr>
                                    <td>{{ $jensiAset->firstItem() + $loop->index }}</td>
                                    <td>{{ $item->uuid }}</td>
                                    <td>{{ $item->name ? ucwords($item->name) : '' }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-warning"
                                            data-bs-toggle="modal" data-bs-target="#modalEditJenisAset"
                                            data-id="{{ $item->uuid }}" data-name="{{ $item->name }}" title="Edit"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger deleteJenisAset"
                                            data-id="{{ $item->uuid }}" data-name="{{ $item->name }}" title="Hapus"
                                            id="confirm-text">
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
                    <div class="card-footer">
                        {{ $jensiAset->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        <form id="formDeleteJenisAset" method="POST">
            @csrf
            @method('DELETE')
        </form>

        @include('dataRef.jenisAset.addJenisAset');
        @include('dataRef.jenisAset.editJenisAset');

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
