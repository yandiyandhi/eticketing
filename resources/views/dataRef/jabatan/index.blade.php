@extends('layouts.app')
@section('title', 'Jabatan')
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
                    <h5 class="mb-0">List Jabatan</h5>
                    <a href="{{ route('jabatan.create') }}" class="btn btn-sm btn-primary"><i class="ti ti-plus me-1"></i>
                        Tambah
                        Jabatan</a>
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
                                    <td>{{ $data->firstItem() + $loop->index }}</td>
                                    <td>{{ $item->uuid }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>

                                        <a href="{{ route('jabatan.edit', ['id' => $item->uuid]) }}"
                                            class="btn btn-sm btn-icon btn-warning" title="Edit"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        @can('jabatan.delete')
                                            <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-danger deleteJabatan"
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
                    <div class="card-footer">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        <form id="formDeleteJabatan" method="POST">
            @csrf
            @method('DELETE')
        </form>

        @include('layouts.footercontent')
    </div>

    @include('partials.alert')
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
