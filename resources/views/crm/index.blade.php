@extends('layouts.app')
@section('title', 'Kantor')
@section('content')
    <div class="layout-page">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Navbar -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @include('partials.alert')

            <div class="row gy-6">
                <div class="col-xl-6">
                    <div class="card">
                        <h5 class="card-header">Basic Checkboxes</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md mb-md-0 mb-5">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label class="form-check-label custom-option-content" for="customCheckTemp3">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="customCheckTemp3" checked />
                                            <span class="custom-option-header">
                                                <span class="h6 mb-0">Discount</span>
                                                <small class="text-body-secondary">20%</small>
                                            </span>
                                            {{-- <span class="custom-option-body">
                                                <small class="option-text">Get 20% off on your next purchases!</small>
                                            </span> --}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label class="form-check-label custom-option-content" for="customCheckTemp4">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="customCheckTemp4" />
                                            <span class="custom-option-header">
                                                <span class="h6 mb-0">Updates</span>
                                                <small class="text-body-secondary">Free</small>
                                            </span>
                                            {{-- <span class="custom-option-body">
                                                <small>Get Updates regarding related products.</small>
                                            </span> --}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Balance</h5>
                                <p class="card-subtitle  my-0">Commercial networks & enterprises</p>
                            </div>
                            <div class="d-sm-flex d-none align-items-center">
                                <h5 class="mb-0 me-4">$ 100,000</h5>
                                <span class="badge bg-label-secondary">
                                    <i class="icon-base ti tabler-arrow-down icon-xs text-danger"></i>
                                    <span class="align-middle">20%</span>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="lineChart"></div>
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

            const config = {
                colors: {
                    warning: '#ffab00'
                }
            };

            const cardColor = '#ffffff';
            const borderColor = '#e0e0e0';
            const labelColor = '#6c757d';

            const lineChartEl = document.querySelector('#lineChart');

            const lineChartConfig = {
                chart: {
                    height: 400,
                    type: 'line',
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    data: [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
                }],
                stroke: {
                    curve: 'straight'
                },
                colors: [config.colors.warning],
                markers: {
                    strokeWidth: 7,
                    strokeColors: [cardColor],
                    colors: [config.colors.warning]
                },
                grid: {
                    borderColor: borderColor
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep',
                        'Okt', 'Nov', 'Des'
                    ],
                    labels: {
                        style: {
                            colors: labelColor
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: labelColor
                        }
                    }
                }
            };

            if (lineChartEl) {
                const lineChart = new ApexCharts(lineChartEl, lineChartConfig);
                lineChart.render();
            }

        });
    </script>
@endpush
