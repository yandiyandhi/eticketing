@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y fs-6">
            {{-- <div class="row g-6">                
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="ti ti-clock ti-28px text-primary"></i></span>
                                </div>
                                <h4 class="mb-0">{{ $statusCount['Queue']['count'] ?? 0 }}</h4>
                            </div>
                            <p class="mb-1">In Queue</p>
                            <p class="mb-0">
                                <span
                                    class="text-heading fw-medium me-2">{{ $statusCount['Queue']['percentage'] ?? 0 }}%</span>
                                <small class="text-muted">than last week</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-border-shadow-warning h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded bg-label-warning"><i
                                            class="ti ti-hourglass-low ti-28px text-warning"></i></span>
                                </div>
                                <h4 class="mb-0">{{ $statusCount['On Progress']['count'] ?? 0 }}</h4>
                            </div>
                            <p class="mb-1">On Progress</p>
                            <p class="mb-0">
                                <span
                                    class="text-heading fw-medium me-2">{{ $statusCount['On Progress']['percentage'] ?? 0 }}%</span>
                                <small class="text-muted">than last week</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-border-shadow-danger h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded bg-label-danger"><i
                                            class="ti ti-alert-circle ti-28px text-danger"></i></span>
                                </div>
                                <h4 class="mb-0">{{ $statusCount['Not Started']['count'] ?? 0 }}</h4>
                            </div>
                            <p class="mb-1">Not Started</p>
                            <p class="mb-0">
                                <span
                                    class="text-heading fw-medium me-2">{{ $statusCount['Not Started']['percentage'] ?? 0 }}%</span>
                                <small class="text-muted">than last week</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-border-shadow-success h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded bg-label-success"><i
                                            class="ti ti-circle-check ti-28px text-success"></i></span>
                                </div>
                                <h4 class="mb-0">{{ $countSuccess ?? 0 }}</h4>
                            </div>
                            <p class="mb-1">Succeed</p>
                            <p class="mb-0">
                                <span
                                    class="text-heading fw-medium me-2">{{ $statusCount['Resolved']['percentage'] ?? 0 }}%</span>
                                <small class="text-muted">than last week</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <hr class="my-4" /> --}}

            <div class="col-xl-12 my-4">
                <h6 class="text-body-secondary">List Request</h6>
                <div class="nav-align-top nav-tabs-shadow">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
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
                        <div class="tab-pane fade show active" id="navs-justified-it" role="tabpanel">
                            <div class="card-header d-flex align-items-center justify-content-between mb-4">
                                <form class="d-flex ms-auto" method="GET" role="search">
                                    <input class="form-control form-control-sm me-2" type="search" name="request"
                                        placeholder="Search request..." value="{{ request('request') }}">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="ti ti-search"></i></button>
                                </form>
                            </div>
                            <div class="table-responsive table">
                                <table class="table" style="font-size: 12pt;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Request By</th>
                                            <th>Request To</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Tanggal Report</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ticket-tbody">
                                        @forelse ($data as $item)
                                            <tr>
                                                <th>{{ $data->firstItem() + $loop->index }}</th>
                                                <td>{{ $item->user->name ?? ' ' }}</td>
                                                <td>{{ strtoupper($item->request_to) ?? ' ' }}</td>
                                                <td>{{ $item->category->task_name ?? ' ' }}</td>
                                                <td>{{ $item->description ?? ' ' }}</td>
                                                <td>{{ $item->created_at ? $item->created_at->locale('id')->translatedFormat('d F Y') : ' ' }}
                                                </td>
                                                <td>{{ $item->status->name ?? ' ' }}</td>
                                                <td>
                                                    <a href="{{ route('ticketing.status', ['status' => $item->uuid]) }}"
                                                        class="btn btn-sm btn-icon btn-warning"title="Edit"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-justified-hr" role="tabpanel">
                            <div class="card-header d-flex align-items-center justify-content-between mb-2">
                                <form class="d-flex ms-auto" method="GET" role="search">
                                    <input class="form-control form-control-sm me-2" type="search" name="request"
                                        placeholder="Search request..." value="{{ request('request') }}">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="ti ti-search"></i></button>
                                </form>
                            </div>
                            <div class="table-responsive table">
                                <table class="table" style="font-size: 12pt;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Request By</th>
                                            <th>Request To</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Tanggal Report</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ticket-tbody">
                                        @forelse ($data as $item)
                                            <tr>
                                                <th>{{ $data->firstItem() + $loop->index }}</th>
                                                <td>{{ $item->user->name ?? ' ' }}</td>
                                                <td>{{ strtoupper($item->request_to) ?? ' ' }}</td>
                                                <td>{{ $item->category->task_name ?? ' ' }}</td>
                                                <td>{{ $item->description ?? ' ' }}</td>
                                                <td>{{ $item->created_at ? $item->created_at->locale('id')->translatedFormat('d F Y') : ' ' }}
                                                </td>
                                                <td>{{ $item->status->name ?? ' ' }}</td>
                                                <td>
                                                    <a href="{{ route('ticketing.status', ['status' => $item->uuid]) }}"
                                                        class="btn btn-sm btn-icon btn-warning"title="Edit"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">List Request</h6>
                    <form class="d-flex ms-auto" method="GET" role="search">
                        <input class="form-control form-control-sm me-2" type="search" name="request"
                            placeholder="Search request..." value="{{ request('request') }}">
                        <button class="btn btn-sm btn-primary" type="submit"><i class="ti ti-search"></i></button>
                    </form>
                </div>
                <div class="table-responsive table">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Request Name</th>
                                <th>Category</th>
                                <th>Request By</th>
                                <th>Description</th>
                                <th>Tanggal Report</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ticket-tbody">
                            @forelse ($data as $item)
                                <tr>
                                    <th>{{ $data->firstItem() + $loop->index }}</th>
                                    <td>{{ $item->request_name ?? ' ' }}</td>
                                    <td>{{ $item->category->task_name ?? ' ' }}</td>
                                    <td>{{ $item->user->name ?? ' ' }}</td>
                                    <td>{{ $item->description ?? ' ' }}</td>
                                    <td>{{ $item->created_at ? $item->created_at->locale('id')->translatedFormat('d F Y') : ' ' }}
                                    </td>
                                    <td>{{ $item->status->name ?? ' ' }}</td>
                                    <td>
                                        <a href="{{ route('ticketing.status', ['status' => $item->uuid]) }}"
                                            class="btn btn-sm btn-icon btn-warning"title="Edit"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $data->links() }}
                    </div>
                </div>
            </div> --}}
        </div>

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
@endpush
