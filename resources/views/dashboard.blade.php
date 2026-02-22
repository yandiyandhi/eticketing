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
                                <h4 class="mb-0">42</h4>
                            </div>
                            <p class="mb-1">In Queue</p>
                            <p class="mb-0">
                                <span class="text-heading fw-medium me-2">+18.2%</span>
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
                                <h4 class="mb-0">8</h4>
                            </div>
                            <p class="mb-1">On Progress</p>
                            <p class="mb-0">
                                <span class="text-heading fw-medium me-2">-8.7%</span>
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
                                <h4 class="mb-0">27</h4>
                            </div>
                            <p class="mb-1">Not Started</p>
                            <p class="mb-0">
                                <span class="text-heading fw-medium me-2">+4.3%</span>
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
                                <h4 class="mb-0">13</h4>
                            </div>
                            <p class="mb-1">Resolved</p>
                            <p class="mb-0">
                                <span class="text-heading fw-medium me-2">-2.5%</span>
                                <small class="text-muted">than last week</small>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/ Card Border Shadow -->
            </div>

            <hr class="my-4" />
            <!-- Column Search -->
            <div class="card">
                <h5 class="card-header">List Antrian Tiket</h5>
                <div class="card-datatable text-nowrap">
                    <table class="dt-column-search table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Request Name</th>
                                <th>Category</th>
                                <th>Request By</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!--/ Column Search -->
        </div>

        @include('layouts.footercontent')
    </div>
@endsection

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>
    var pusher = new Pusher("{{ env('REVERB_APP_KEY') }}", {
        wsHost: window.location.hostname,
        wsPort: 8080,
        forceTLS: false,
        enabledTransports: ['ws']
    });

    var channel = pusher.subscribe('tickets');

    channel.bind('TicketCreated', function(data) {
        console.log("Tiket baru:", data);
        alert("Tiket baru masuk!");
    });
</script>
