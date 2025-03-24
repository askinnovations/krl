
@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <!-- <body data-layout="horizontal"> -->
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Profile</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="{{ $userCount }}">0</span>+
                                                </h4>
                                            </div>

                                            <div class="col-6">
                                                <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div>
                                        </div>
                                        <!-- <div class="text-nowrap">
                                            <span class="badge bg-success-subtle text-success">+150</span>
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div> -->
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
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Number of complaints</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="{{ $complaintCount }}">0</span>+
                                                </h4>
                                            </div>
                                            <div class="col-6">
                                                <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div>
                                        </div>
                                        <!-- <div class="text-nowrap">
                                            <span class="badge bg-danger-subtle text-danger">29 +</span>
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div> -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->       
                             
                        </div><!-- end row-->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                
           
            <!-- end main content-->

       

        
        

        @endsection