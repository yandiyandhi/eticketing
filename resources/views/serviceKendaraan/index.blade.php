@extends('layouts.app')
@section('title', 'List Service')
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
                    <div
                        class="d-flex flex-column flex-md-row justify-content-between align-items-center align-items-md-center mb-6 row-gap-4">
                        <div class="d-flex flex-column justify-content-start">
                            <h6 class="mb-0">List Service Kendaraan</h6>
                        </div>
                        <div class="d-flex justify-content-center align-content-center flex-wrap gap-4">
                            <div class="d-flex gap-8">
                                <div class="justify-content-end d-flex">
                                    <a href="{{ route('service.create') }}" class="btn btn-sm btn-primary">
                                        <i class="ti ti-plus"></i> Request
                                    </a>
                                </div>
                                <form class="d-flex ms-auto" method="GET" role="search">
                                    <input class="form-control form-control-sm me-2" type="search" name="request"
                                        placeholder="Search request..." value="{{ request('request') }}">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="ti ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Nama</th>
                                <th>No Polisi</th>
                                <th>Deskripsi</th>
                                <th>Alasan</th>
                                <th>User</th>
                                <th>Pengajuan</th>
                                <th>Foto 1</th>
                                <th>Foto 2</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <th>{{ $data->firstItem() + $loop->index }}</th>
                                    <td>{{ $item->aset->jenis_aset ? ucwords($item->aset->jenis_aset->name) : ' ' }}</td>
                                    <td>{{ $item->aset->nama_aset ? ucwords($item->aset->nama_aset) : ' ' }}</td>
                                    <td>{{ $item->aset->no_polisi ? strtoupper($item->aset->no_polisi) : ' ' }}</td>
                                    <td>{{ $item->deskripsi_service ? ucwords($item->deskripsi_service) : ' ' }}</td>
                                    <td>{{ $item->alasan_service ? ucwords($item->alasan_service) : ' ' }}</td>
                                    <td>{{ $item->userPengajuan ? ucwords($item->userPengajuan->name) : ' ' }}</td>
                                    <td>{{ $item->tanggal_pengajuan ? $item->tanggal_pengajuan->format('d-m-y') : ' ' }}
                                    </td>
                                    <td>
                                        @if ($item->foto1)
                                            <a href="{{ asset('storage/' . $item->foto1) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $item->foto1) }}" width="80"
                                                    height="80" style="object-fit: cover;">
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->foto2)
                                            <a href="{{ asset('storage/' . $item->foto2) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $item->foto2) }}" width="80"
                                                    height="80" style="object-fit: cover;">
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('service.detailPengajuan', ['id' => $item->uuid]) }}"
                                            class="btn btn-sm btn-icon btn-info" title="Detail" target="_blank">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('service.editStatus', ['id' => $item->uuid]) }}"
                                            class="btn btn-sm btn-icon btn-warning" title="Update Status">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ route('service.editService', ['id' => $item->uuid]) }}"
                                            class="btn btn-sm btn-icon btn-warning" title="Edit">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger batalService"
                                            title="Batal" data-id="{{ $item->uuid }}"
                                            data-name="{{ $item->aset->no_polisi }}">
                                            <i class="fa-solid fa-cancel"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-footer">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            <!--/ Column Search -->
        </div>
        <form id="formBatalService" method="POST">
            @csrf
            @method('put')
        </form>
        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
