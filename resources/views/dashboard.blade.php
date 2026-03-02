@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row g-6">
                <!-- Card Border Shadow -->
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
                                <h4 class="mb-0">{{ $statusCount['Resolved']['count'] ?? 0 }}</h4>
                            </div>
                            <p class="mb-1">Resolved</p>
                            <p class="mb-0">
                                <span
                                    class="text-heading fw-medium me-2">{{ $statusCount['Resolved']['percentage'] ?? 0 }}%</span>
                                <small class="text-muted">than last week</small>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/ Card Border Shadow -->
            </div>

            <hr class="my-4" />

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">List Request</h6>
                    <form class="d-flex ms-auto" method="GET" role="search">
                        <input class="form-control form-control-sm me-2" type="search" name="q"
                            placeholder="Search request..." value="{{ request('q') }}">
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
                                    <th>{{ $loop->iteration ?? ' ' }}</th>
                                    <td>{{ $item->request_name ?? ' ' }}</td>
                                    <td>{{ $item->category->task_name ?? ' ' }}</td>
                                    <td>{{ $item->user->name ?? ' ' }}</td>
                                    <td>{{ $item->description ?? ' ' }}</td>
                                    <td>{{ $item->created_at ? $item->created_at->locale('id')->translatedFormat('d F Y') : ' ' }}
                                    </td>
                                    <td>{{ $item->status->name ?? ' ' }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-icon btn-warning"
                                            data-bs-toggle="modal" data-bs-target="#modalEditRequest" data-id="#"
                                            data-name="#" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('layouts.footercontent')
    </div>
@endsection

@push('myscript')
    <script src="{{ asset('js/script/script.js') }}"></script>
    {{-- <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.15.3/dist/echo.iife.js"></script>

    <script>
        window.Pusher = Pusher;

        window.Echo = new Echo({
            broadcaster: 'reverb',
            key: "{{ config('broadcasting.connections.reverb.key') }}",
            wsHost: "{{ config('broadcasting.connections.reverb.options.host') }}",
            wsPort: "{{ config('broadcasting.connections.reverb.options.port') }}",
            wssPort: "{{ config('broadcasting.connections.reverb.options.port') }}",
            forceTLS: false,
            enabledTransports: ['ws', 'wss'],
        });        

        window.Echo.channel('tickets')
            .listen('ticket.created', (event) => {
                console.log('event received:', event);

                alert('Ticket baru: ' + event.ticket.request_name);
            });
    </script> --}}
@endpush
