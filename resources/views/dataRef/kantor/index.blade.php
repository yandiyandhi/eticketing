@extends('layouts.app')
@section('title', 'Kantor')
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
                    <h5 class="mb-0">List Kantor</h5>
                    @can('kantor.create')
                        <a href="{{ route('kantor.create') }}" class="btn btn-sm btn-primary"><i class="ti ti-plus me-1"></i>
                            Tambah Kantor</a>
                    @else
                        <a href="#" class="btn btn-sm btn-secondary" @disabled(true)><i
                                class="ti ti-plus me-1"></i>
                            Tambah Kantor</a>
                    @endcan
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
                            @forelse ($kantor as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->uuid }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        @can('kantor.edit')
                                            <a href="{{ route('kantor.edit', $item->uuid) }}"
                                                class="btn btn-sm btn-icon btn-warning" title="Edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        @else
                                            <a href="#" class="btn btn-sm btn-icon btn-secondary"
                                                @disabled(true)><i class="fa-solid fa-pen-to-square"></i></a>
                                        @endcan
                                        @can('kantor.delete')
                                            <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger deleteKantor"
                                                data-id="{{ $item->uuid }}" data-name="{{ $item->name }}" title="Hapus"
                                                id="confirm-text">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-sm btn-icon btn-secondary"
                                                @disabled(true)><i class="fa-solid fa-trash"></i></a>
                                        @endcan
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
