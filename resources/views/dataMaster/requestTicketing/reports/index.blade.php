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
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">List Request</h6>
                    <form class="d-flex ms-auto" method="GET" role="search">
                        <input class="form-control form-control-sm me-2" type="search" name="request"
                            placeholder="Search request..." value="{{ request('request') }}">
                        <button class="btn btn-sm btn-primary" type="submit"><i class="ti ti-search"></i></button>
                    </form>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Dept</th>
                                <th>Request Name</th>
                                <th>Desc</th>
                                <th>Status</th>
                                <th>Date Req</th>
                                <th>Date End</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tickets as $item)
                                <tr>
                                    <th>{{ $tickets->firstItem() + $loop->index }}</th>
                                    <td>{{ $item->user->name ?? ' ' }}</td>
                                    <td>{{ $item->department->name ?? ' ' }}</td>
                                    <td>{{ $item->request_name ?? ' ' }}</td>
                                    <td>{{ $item->description ?? ' ' }}</td>
                                    <td>{{ $item->status->name ?? ' ' }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y') ?? ' ' }}</td>
                                    <td>{{ $item->updated_at->format('d-m-Y') ?? ' ' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $tickets->links() }}
                    </div>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        @include('layouts.footercontent')
    </div>
@endsection
