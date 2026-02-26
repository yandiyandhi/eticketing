@extends('layouts.app')
@section('title', 'KPI')
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
                    <h5 class="mb-0">List KPI</h5>
                    <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddKpi"><i
                            class="ti ti-plus me-1"></i> Tambah KPI</a>
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
                            {{-- @forelse ($category as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->task_name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-warning"
                                            data-bs-toggle="modal" data-bs-target="#modalEditStatus"
                                            data-id="{{ $item->uuid }}" data-name="{{ $item->name }}" title="Edit"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger deleteStatus"
                                            data-id="{{ $item->uuid }}" data-name="{{ $item->name }}" title="Hapus"
                                            id="confirm-text">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Column Search -->
        </div>                                  

        @include('dataRef.kpi.addKpi');

     @include('layouts.footercontent')
</div>
@endsection