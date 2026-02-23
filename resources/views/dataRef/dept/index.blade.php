@extends('layouts.app')
@section('title', 'Department')
@section('content')
<div class="layout-page">
    <!-- Navbar -->
        @include('layouts.navbar')
    <!-- Navbar -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Column Search -->
            <div class="card">
                <div class="row">
                    <div class="col"><h5 class="card-header">List Request</h5></div>
                    <div class="col align-items-end"><h5 class="card-header">List Request</h5></div>
                </div>
                
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