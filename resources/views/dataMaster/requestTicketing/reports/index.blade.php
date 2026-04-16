@extends('layouts.app')
@section('title', 'List Request Ticketing')
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
                            <h6 class="card-title">List Request IT</h6>
                        </div>
                        <div class="d-flex justify-content-center align-content-center flex-wrap gap-4">
                            <div class="d-flex gap-8">
                                @can('laporan.export')
                                    <div class="justify-content-end d-flex">
                                        <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                            data-bs-target="#modalExportIt">
                                            <i class="ti ti-download"></i> Export
                                        </a>
                                    </div>
                                @else
                                    <div class="justify-content-end d-flex">
                                        <a href="#" class="btn btn-sm btn-secondary">
                                            <i class="ti ti-download"></i> Export
                                        </a>
                                    </div>
                                @endcan
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
                                <th>User</th>
                                <th>Dept</th>
                                <th>Desc</th>
                                <th>Status</th>
                                <th>Date Req</th>
                                <th>Time Start</th>
                                <th>Time End</th>
                                <th>Date Approve</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tickets as $item)
                                <tr>
                                    <th>{{ $tickets->firstItem() + $loop->index }}</th>
                                    <td>{{ $item->user->name ?? ' ' }}</td>
                                    <td>{{ $item->department->name ?? ' ' }}</td>
                                    <td>{{ $item->description ?? ' ' }}</td>
                                    <td>{{ $item->status->name ?? ' ' }}</td>
                                    <td>{{ $item->created_at ?? ' ' }}
                                    </td>
                                    <td>{{ $item->time_start ? $item->time_start : ' ' }}
                                    </td>
                                    <td>{{ $item->time_end ? $item->time_end : ' ' }}
                                    </td>
                                    <td>{{ $item->time_approved ?? ' ' }}</td>
                                    <td>{{ $item->created_at ?? ' ' }}</td>
                                    <td>{{ $item->updated_at ?? ' ' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-footer">
                        {{ $tickets->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        @include('dataMaster.requestTicketing.reports.modalIt')
        @include('layouts.footercontent')
    </div>
@endsection
@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
