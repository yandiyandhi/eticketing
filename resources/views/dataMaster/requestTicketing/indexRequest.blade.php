@extends('layouts.app')
@section('title', 'Request Ticketing')
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
                    <h6 class="mb-0">List Request</h6>
                    <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddRequest"><i
                            class="ti ti-plus me-1"></i> Request</a>
                </div>


                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Request By</th>
                                <th>Request To</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <th>{{ $data->firstItem() + $loop->index }}</th>
                                    <td>{{ $item->category->task_name ?? ' ' }}</td>
                                    <td>{{ $item->user->name ?? ' ' }}</td>
                                    <td>{{ strtoupper($item->request_to) ?? ' ' }}</td>
                                    <td>{{ $item->description ?? ' ' }}</td>
                                    <td>{{ $item->status->name ?? ' ' }}</td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="icon-base ti ti-dots-vertical"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('ticketing.edit', ['tiket' => $item->uuid]) }}"
                                                    class="btn btn-sm btn-icon btn-warning">Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item StatusRequestSuccess" href="javascript:void(0)"
                                                    class="btn btn-sm btn-icon btn-warning" data-id="{{ $item->uuid }}"
                                                    data-name="Success">{{ $success->name ?? ' ' }}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item StatusRequestCancel" href="javascript:void(0)"
                                                    class="btn btn-sm btn-icon btn-warning" data-id="{{ $item->uuid }}"
                                                    data-name="{{ $cancel->name ?? ' ' }}">{{ $cancel->name ?? ' ' }}</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data tidak ditemukan.</td>
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

        @include('dataMaster.requestTicketing.createRequest')

        <form id="formUpdateStatus" method="POST">
            @csrf
            @method('PUT')
        </form>

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
