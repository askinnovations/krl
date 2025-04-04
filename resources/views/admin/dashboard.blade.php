
@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
   
<div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total
                                                Revenue</span>
                                            <h4 class="mb-3">
                                                ₹ <span class="counter-value" data-target="865.2">0</span>k
                                            </h4>
                                        </div>

                                        <div class="col-6">
                                            <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-nowrap">
                                        <span class="badge bg-success-subtle text-success">+₹20.9k</span>
                                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-6 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Completed
                                                Deliveries</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="6258">0</span>
                                            </h4>
                                        </div>
                                        <div class="col-6">
                                            <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-nowrap">
                                        <span class="badge bg-danger-subtle text-danger">-29 Deliveries</span>
                                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col-->

                        <div class="col-xl-6 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total
                                                Expenditure</span>
                                            <h4 class="mb-3">
                                                ₹ <span class="counter-value" data-target="4.32">0</span>M
                                            </h4>
                                        </div>
                                        <div class="col-6">
                                            <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-nowrap">
                                        <span class="badge bg-success-subtle text-success">+ ₹2.8k</span>
                                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-6 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Profit
                                                Margin</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="12.57">0</span>%
                                            </h4>
                                        </div>
                                        <div class="col-6">
                                            <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-nowrap">
                                        <span class="badge bg-success-subtle text-success">+2.95%</span>
                                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row-->

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Fleet Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <!-- Vehicle RTO -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Vehicle RTO
                                                Registrations</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="132">0</span>
                                            </h4>
                                        </div>

                                    </div>
                                    <div class="text-nowrap">
                                        <span class="badge bg-success-subtle text-success">+12</span>
                                        <span class="ms-1 text-muted font-size-13">Since last month</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Active
                                                Notifications</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="58">0</span>
                                            </h4>
                                        </div>


                                    </div>
                                    <div class="text-nowrap">
                                        <span class="badge bg-danger-subtle text-danger">+8</span>
                                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Maintenance -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Maintenance
                                                Cost</span>
                                            <h4 class="mb-3">
                                                ₹ <span class="counter-value" data-target="1.25">0</span>M
                                            </h4>
                                        </div>

                                    </div>
                                    <div class="text-nowrap">
                                        <span class="badge bg-success-subtle text-success">+₹200k</span>
                                        <span class="ms-1 text-muted font-size-13">Since last month</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tyres -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Tyre
                                                Replacements</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="32">0</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="text-nowrap">
                                        <span class="badge bg-danger-subtle text-danger">+5</span>
                                        <span class="ms-1 text-muted font-size-13">Since last month</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

        
        
 @endsection