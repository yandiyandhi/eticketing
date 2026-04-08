@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y fs-6">

            <div class="row g-4">
                @forelse ($status as $item)
                    <div class="col-md">
                        <div
                            class="card card-border-shadow-{{ match ($item->name) {
                                'Queue' => 'primary',
                                'On Progress' => 'warning',
                                'Cancel' => 'danger',
                                'Done' => 'info',
                                'Success' => 'success',
                                default => 'secondary',
                            } }} h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar me-4">
                                        <span
                                            class="avatar-initial rounded bg-label-{{ match ($item->name) {
                                                'Queue' => 'primary',
                                                'On Progress' => 'warning',
                                                'Cancel' => 'danger',
                                                'Done' => 'info',
                                                'Success' => 'success',
                                                default => 'secondary',
                                            } }}"><i
                                                class="fa-solid fa-{{ match ($item->name) {
                                                    'Queue' => 'clock',
                                                    'On Progress' => 'rotate',
                                                    'Cancel' => 'ban',
                                                    'Done' => 'check',
                                                    'Success' => 'calendar-check',
                                                    default => 'secondary',
                                                } }} ti-28px text-{{ match ($item->name) {
                                                    'Queue' => 'primary',
                                                    'On Progress' => 'warning',
                                                    'Cancel' => 'danger',
                                                    'Done' => 'info',
                                                    'Success' => 'success',
                                                    default => 'secondary',
                                                } }}"></i></span>
                                    </div>
                                    <h4 class="mb-0">{{ $item->count ?? 0 }}</h4>
                                </div>
                                <p class="mb-1">{{ $item->name }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>

            <hr class="my-4" />

            <div class="col-xl-12 my-4">
                <h6 class="text-body-secondary">List Request</h6>
                <div class="nav-align-top nav-tabs-shadow">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-it" aria-controls="navs-justified-it" aria-selected="true">
                                <span class="d-sm-inline-flex align-items-center">
                                    IT
                                </span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-hr" aria-controls="navs-justified-hr" aria-selected="false">
                                <span class="d-sm-inline-flex align-items-center">HR</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show" id="navs-justified-it" role="tabpanel">
                            <div class="card-header d-flex align-items-center justify-content-between mb-4">
                                <form class="d-flex ms-auto" method="GET" role="search">
                                    <input class="form-control form-control-sm me-2" type="search" name="requestit"
                                        placeholder="Search request..." value="{{ request('requestit') }}">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="ti ti-search"></i></button>
                                </form>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table" style="font-size: 12pt;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Request By</th>
                                            <th>Request To</th>
                                            <th>Category</th>
                                            <th>Time Start</th>
                                            <th>Time End</th>
                                            <th>Description</th>
                                            <th>Date Report</th>
                                            <th>Status</th>
                                            @can('dashboardit.edit')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody id="ticket-tbody">
                                        @forelse ($datait as $item)
                                            <tr>
                                                <th>{{ $datait->firstItem() + $loop->index }}</th>
                                                <td>{{ $item->user->name ?? ' ' }}</td>
                                                <td>{{ strtoupper($item->request_to) ?? ' ' }}</td>
                                                <td>{{ $item->category->task_name ?? ' ' }}</td>
                                                <td>{{ $item->time_start ? $item->time_start : ' ' }}
                                                </td>
                                                <td>{{ $item->time_end ? $item->time_end : ' ' }}
                                                </td>
                                                <td>{{ $item->description ?? ' ' }}</td>
                                                <td>{{ $item->created_at ? $item->created_at->locale('id')->translatedFormat('d F Y') : ' ' }}
                                                </td>
                                                <td>{{ $item->status->name ?? ' ' }}</td>
                                                @can('dashboardit.edit')
                                                    <td>
                                                        <a href="{{ route('ticketing.status', ['status' => $item->uuid]) }}"
                                                            class="btn btn-sm btn-icon btn-warning"title="Edit"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="15" class="text-center">Data tidak ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $datait->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-justified-hr" role="tabpanel">
                            <div class="card-header d-flex align-items-center justify-content-between mb-2">
                                <form class="d-flex ms-auto" method="GET" role="search">
                                    <input class="form-control form-control-sm me-2" type="search" name="requesthr"
                                        placeholder="Search request..." value="{{ request('requesthr') }}">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="ti ti-search"></i></button>
                                </form>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table" style="font-size: 12pt;">
                                    <thead style="font-size: 10pt;">
                                        <tr>
                                            <th>No</th>
                                            <th>Request By</th>
                                            <th>Request To</th>
                                            <th>Category</th>
                                            <th>Time Start</th>
                                            <th>Time End</th>
                                            <th>Description</th>
                                            <th>Date Report</th>
                                            <th>Status</th>
                                            @can('dashboardhr.edit')
                                                <th>Action</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody id="ticket-tbody">
                                        @forelse ($datahr as $item)
                                            <tr>
                                                <th>{{ $datahr->firstItem() + $loop->index }}</th>
                                                <td>{{ $item->user->name ?? ' ' }}</td>
                                                <td>{{ strtoupper($item->request_to) ?? ' ' }}</td>
                                                <td>{{ $item->category->task_name ?? ' ' }}</td>
                                                <td>{{ $item->time_start ? $item->time_start : ' ' }}
                                                </td>
                                                <td>{{ $item->time_end ? $item->time_end : ' ' }}
                                                </td>
                                                <td>{{ $item->description ?? ' ' }}</td>
                                                <td>{{ $item->created_at ? $item->created_at->locale('id')->translatedFormat('d F Y') : ' ' }}
                                                </td>
                                                <td>{{ $item->status->name ?? ' ' }}</td>
                                                @can('dashboardhr.edit')
                                                    <td>
                                                        <a href="{{ route('ticketing.status', ['status' => $item->uuid]) }}"
                                                            class="btn btn-sm btn-icon btn-warning"title="Edit"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="15" class="text-center">Data tidak ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $datahr->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const params = new URLSearchParams(window.location.search);

            let tab = '#navs-justified-it'; // default

            if (params.has('requesthr')) {
                tab = '#navs-justified-hr';
            } else if (params.has('requestit')) {
                tab = '#navs-justified-it';
            } else if (params.get('tab')) {
                tab = params.get('tab');
            }

            const trigger = document.querySelector(`[data-bs-target="${tab}"]`);
            if (trigger) {
                const tabInstance = new bootstrap.Tab(trigger);
                tabInstance.show();
            }
        });
    </script>
@endpush
