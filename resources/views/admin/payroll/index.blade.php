@extends('admin.layouts.app')
@section('title', 'Payroll | KRL')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Payroll</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payroll</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Warehouse Listing Page -->
        <div class="row listing-form">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title">💼  payroll Listing</h4>
                            <p class="card-title-desc">
                                View, edit, or delete payroll details below.
                            </p>
                        </div>
                        <button class="btn" id="addWarehouseBtn"
                            style="background-color: #ca2639; color: white; border: none;"
                            data-bs-toggle="modal" data-bs-target="#addWarehouseModal">
                            <i class="fas fa-plus"></i> Add Payroll
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Payroll</th>
                                    <th>Address</th>
                                    <th>Incharge</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Main Payroll</td>
                                    <td>123 Industrial Area</td>
                                    <td>John Doe</td>
                                    <td>
                                        <button class="btn btn-sm btn-light view-btn" data-bs-toggle="modal"
                                            data-bs-target="#viewWarehouseModal"><i
                                                class="fas fa-eye text-primary"></i></button>
                                        <button class="btn btn-sm btn-light edit-btn" data-bs-toggle="modal"
                                            data-bs-target="#editWarehouseModal"><i
                                                class="fas fa-pen text-warning"></i></button>
                                        <button class="btn btn-sm btn-light delete-btn"><i
                                                class="fas fa-trash text-danger"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Storage Hub</td>
                                    <td>456 Warehouse Road</td>
                                    <td>Jane Smith</td>
                                    <td>
                                        <button class="btn btn-sm btn-light view-btn" data-bs-toggle="modal"
                                            data-bs-target="#viewWarehouseModal"><i
                                                class="fas fa-eye text-primary"></i></button>
                                        <button class="btn btn-sm btn-light edit-btn" data-bs-toggle="modal"
                                            data-bs-target="#editWarehouseModal"><i
                                                class="fas fa-pen text-warning"></i></button>
                                        <button class="btn btn-sm btn-light delete-btn"><i
                                                class="fas fa-trash text-danger"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Logistics Center</td>
                                    <td>789 Supply Lane</td>
                                    <td>Michael Johnson</td>
                                    <td>
                                        <button class="btn btn-sm btn-light view-btn" data-bs-toggle="modal"
                                            data-bs-target="#viewWarehouseModal"><i
                                                class="fas fa-eye text-primary"></i></button>
                                        <button class="btn btn-sm btn-light edit-btn" data-bs-toggle="modal"
                                            data-bs-target="#editWarehouseModal"><i
                                                class="fas fa-pen text-warning"></i></button>
                                        <button class="btn btn-sm btn-light delete-btn"><i
                                                class="fas fa-trash text-danger"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Warehouse Modal -->
        <div class="modal fade" id="viewWarehouseModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">💼  Payroll Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>🏭 Name:</strong> <span id="viewWarehouseName"></span></p>
                        <p><strong>📍 Address:</strong> <span id="viewWarehouseAddress"></span></p>
                        <p><strong>👨‍💼 Incharge:</strong> <span id="viewWarehouseIncharge"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Warehouse Modal -->
        <div class="modal fade" id="addWarehouseModal" tabindex="-1"
            aria-labelledby="addWarehouseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addWarehouseModalLabel">💼  Add Payroll</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">💼  Payroll Name</label>
                                    <input type="text" class="form-control" id="inputWarehouseName"
                                        placeholder="Enter warehouse name">
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <label class="form-label">📍 Address</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="Enter address">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">👨‍💼 Incharge</label>
                                    <input type="text" class="form-control" id="inputIncharge"
                                        placeholder="Enter incharge name">
                                </div> --}}
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-primary" id="saveWarehouse">Add
                                    Payroll</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Warehouse Modal -->
        <div class="modal fade" id="editWarehouseModal" tabindex="-1"
            aria-labelledby="editWarehouseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editWarehouseModalLabel">✏️ Edit Payroll</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">💼  Payroll Name</label>
                                    <input type="text" class="form-control" id="editWarehouseName">
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <label class="form-label">📍 Address</label>
                                    <input type="text" class="form-control" id="editAddress">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">👨‍💼 Incharge</label>
                                    <input type="text" class="form-control" id="editIncharge">
                                </div> --}}
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-primary" id="updateWarehouse">Update
                                    Payroll</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>







    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © KRL.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design &amp; Develop by <a href="http://askinnovations.co.in/"
                        class="text-decoration-underline">ASK Innovations</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->
<div class="right-bar">
<div data-simplebar class="h-100">
<div class="rightbar-title d-flex align-items-center p-3">

    <h5 class="m-0 me-2">Theme Customizer</h5>

    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
        <i class="mdi mdi-close noti-icon"></i>
    </a>
</div>

<!-- Settings -->
<hr class="m-0" />

<div class="p-4">
    <h6 class="mb-3">Layout</h6>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="layout" id="layout-vertical" value="vertical">
        <label class="form-check-label" for="layout-vertical">Vertical</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="layout" id="layout-horizontal"
            value="horizontal">
        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
    </div>

    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light"
            value="light">
        <label class="form-check-label" for="layout-mode-light">Light</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
        <label class="form-check-label" for="layout-mode-dark">Dark</label>
    </div>

    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild"
            value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed"
            value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
    </div>

    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed"
            value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="layout-position" id="layout-position-scrollable"
            value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
    </div>

    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light"
            value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
        <label class="form-check-label" for="topbar-color-light">Light</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark"
            onchange="document.body.setAttribute('data-topbar', 'dark')">
        <label class="form-check-label" for="topbar-color-dark">Dark</label>
    </div>

    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

    <div class="form-check sidebar-setting">
        <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default"
            value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
        <label class="form-check-label" for="sidebar-size-default">Default</label>
    </div>
    <div class="form-check sidebar-setting">
        <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact"
            value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
    </div>
    <div class="form-check sidebar-setting">
        <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small"
            value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
    </div>

    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

    <div class="form-check sidebar-setting">
        <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light"
            value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
        <label class="form-check-label" for="sidebar-color-light">Light</label>
    </div>
    <div class="form-check sidebar-setting">
        <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark"
            value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
    </div>
    <div class="form-check sidebar-setting">
        <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand"
            value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
    </div>

    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr"
            value="ltr">
        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl"
            value="rtl">
        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
    </div>

</div>

</div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
{{-- <script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="assets/libs/pace-js/pace.min.js"></script>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script> --}}

@endsection