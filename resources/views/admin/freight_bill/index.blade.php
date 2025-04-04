@extends('admin.layouts.app')
@section('title', 'Freight-bill | KRL')
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Freight Bill</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Freight Bill</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row add form">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>📜 Freight Bill Details Add</h4>
                                <p>Enter the required details for the freight bill.</p>
                            </div>
                            <button class="btn" id="backToListBtn"
                                style="background-color: #ca2639; color: white; border: none;">
                                ⬅ Back to Listing
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Consignor Details -->
                                <div class="col-md-6">
                                    <h5>📦 Consignor (Sender)</h5>
                                    <div class="mb-3">
                                        <label class="form-label">Consignor Master</label>
                                        <input type="text" class="form-control" placeholder="Enter consignor name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Multiple Addresses</label>
                                        <textarea class="form-control" rows="2"
                                            placeholder="Enter consignor addresses"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Multiple GST Numbers</label>
                                        <input type="text" class="form-control" placeholder="Enter GST numbers">
                                    </div>
                                </div>

                                <!-- Consignee Details -->
                                <div class="col-md-6">
                                    <h5>📦 Consignee (Receiver)</h5>
                                    <div class="mb-3">
                                        <label class="form-label">Consignee Master</label>
                                        <input type="text" class="form-control" placeholder="Enter consignee name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Multiple Addresses</label>
                                        <textarea class="form-control" rows="2"
                                            placeholder="Enter consignee addresses"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Multiple GST Numbers</label>
                                        <input type="text" class="form-control" placeholder="Enter GST numbers">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Date -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">📅 Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>

                                <!-- Vehicle Ownership -->
                                <div class="col-md-4">
                                    <label class="form-label">🛻 Vehicle Ownership</label>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vehicle" checked>
                                            <label class="form-check-label">Own</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vehicle">
                                            <label class="form-check-label">Other</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Vehicle Type -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">🚛 Vehicle Type</label>
                                        <select class="form-select">
                                            <option selected>Select Type</option>
                                            <option>Truck</option>
                                            <option>Van</option>
                                            <option>Trailer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Delivery Mode -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">🚢 Delivery Mode</label>
                                        <select class="form-select">
                                            <option selected>Select Mode</option>
                                            <option>Road</option>
                                            <option>Rail</option>
                                            <option>Air</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- From Location -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">📍 From (Origin)</label>
                                        <select class="form-select">
                                            <option selected>Select Origin</option>
                                            <option>Mumbai</option>
                                            <option>Delhi</option>
                                            <option>Chennai</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- To Location -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">📍 To (Destination)</label>
                                        <select class="form-select">
                                            <option selected>Select Destination</option>
                                            <option>Kolkata</option>
                                            <option>Hyderabad</option>
                                            <option>Pune</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Submit Button -->
                                <div class="col-12 text-end">
                                    <button class="btn btn-primary">Generate Freight Bill</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- LR / Consignment Listing Page -->
            <div class="row listing-form">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">📑 Freight Bill</h4>
                                <p class="card-title-desc">View, edit, or delete freight bill details below.</p>
                            </div>
                            <button class="btn" id="addFreightBillBtn"
                                style="background-color: #ca2639; color: white; border: none;">
                                <i class="fas fa-plus"></i> Add Freight Bill
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Order ID</th>
                                        <th>Consignment No</th>
                                        <th>Consignor</th>
                                        <th>Consignee</th>
                                        <th>Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="lr-row" data-id="1">
                                        <td>1</td>
                                        <td>OR0001</td>
                                        <td>LR123456</td>
                                        <td>ABC Logistics</td>
                                        <td>XYZ Enterprises</td>
                                        <td>2025-03-28</td>
                                        <td>Mumbai</td>
                                        <td>Delhi</td>
                                        <td>
                                            <button class="btn btn-sm btn-light view-btn"><i
                                                    class="fas fa-eye text-primary"></i></button>
                                            <button class="btn btn-sm btn-light download-btn"><i class="fas fa-download"
                                                    style="color: green;"></i></button>
                                            <button class="btn btn-sm btn-light edit-btn"><i
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

            <div class="row view-form" style="display: none;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>🚛 View Vehicle Details</h4>
                                <p>Review the details of the selected vehicle.</p>
                            </div>
                            <button class="btn" id="backToListFromView"
                                style="background-color: #ca2639; color: white; border: none;">
                                ⬅ Back to Listing
                            </button>
                        </div>
                        <div class="card-body">
                            <p><strong>Vehicle Type:</strong> <span id="viewVehicleType"></span></p>
                            <p><strong>GVW:</strong> <span id="viewGVW"></span></p>
                            <p><strong>Payload:</strong> <span id="viewPayload"></span></p>
                            <p><strong>Vehicle No:</strong> <span id="viewVehicleNo"></span></p>
                            <p><strong>Chassis Number:</strong> <span id="viewChassisNumber"></span></p>
                            <p><strong>Engine Number:</strong> <span id="viewEngineNumber"></span></p>
                            <p><strong>Registered Mobile Number:</strong> <span id="viewMobileNumber"></span></p>
                            <p><strong>Number of Tyres:</strong> <span id="viewTyres"></span></p>

                            <h5>📄 Documents</h5>
                            <div class="document-previews">
                                <p><strong>RC Document:</strong></p>
                                <img id="rcDocPreview" src="" alt="RC Document" class="img-thumbnail mb-2"
                                    style="display:none; width:150px;">

                                <p><strong>Fitness Certificate:</strong></p>
                                <img id="fitnessDocPreview" src="" alt="Fitness Certificate" class="img-thumbnail mb-2"
                                    style="display:none; width:150px;">

                                <p><strong>Insurance:</strong></p>
                                <img id="insuranceDocPreview" src="" alt="Insurance" class="img-thumbnail mb-2"
                                    style="display:none; width:150px;">

                                <p><strong>Authorization Permit:</strong></p>
                                <img id="authPermitPreview" src="" alt="Authorization Permit" class="img-thumbnail mb-2"
                                    style="display:none; width:150px;">

                                <p><strong>National Permit:</strong></p>
                                <img id="nationalPermitPreview" src="" alt="National Permit" class="img-thumbnail mb-2"
                                    style="display:none; width:150px;">

                                <p><strong>Tax Document:</strong></p>
                                <img id="taxDocPreview" src="" alt="Tax Document" class="img-thumbnail mb-2"
                                    style="display:none; width:150px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function loadVehicleDetails(data) {
                    document.getElementById("viewVehicleType").textContent = data.vehicleType;
                    document.getElementById("viewGVW").textContent = data.gvw;
                    document.getElementById("viewPayload").textContent = data.payload;
                    document.getElementById("viewVehicleNo").textContent = data.vehicleNo;
                    document.getElementById("viewChassisNumber").textContent = data.chassisNumber;
                    document.getElementById("viewEngineNumber").textContent = data.engineNumber;
                    document.getElementById("viewMobileNumber").textContent = data.mobileNumber;
                    document.getElementById("viewTyres").textContent = data.tyres;

                    if (data.rcDoc) displayImage("rcDocPreview", data.rcDoc);
                    if (data.fitnessDoc) displayImage("fitnessDocPreview", data.fitnessDoc);
                    if (data.insuranceDoc) displayImage("insuranceDocPreview", data.insuranceDoc);
                    if (data.authPermit) displayImage("authPermitPreview", data.authPermit);
                    if (data.nationalPermit) displayImage("nationalPermitPreview", data.nationalPermit);
                    if (data.taxDoc) displayImage("taxDocPreview", data.taxDoc);
                }

                function displayImage(imgId, src) {
                    var imgElement = document.getElementById(imgId);
                    imgElement.src = src;
                    imgElement.style.display = "block";
                }
            </script>




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
                        Design &amp; Develop by <a href="http://askinnovations.co.in/" class="text-decoration-underline">ASK
                            Innovations</a>
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
                    <input class="form-check-input" type="radio" name="layout" id="layout-horizontal" value="horizontal">
                    <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light">
                    <label class="form-check-label" for="layout-mode-light">Light</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
                    <label class="form-check-label" for="layout-mode-dark">Dark</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild" value="fuild"
                        onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                    <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed"
                        onchange="document.body.setAttribute('data-layout-size', 'boxed')">
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
                    <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light" value="light"
                        onchange="document.body.setAttribute('data-topbar', 'light')">
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
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small"
                        onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                    <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light" value="light"
                        onchange="document.body.setAttribute('data-sidebar', 'light')">
                    <label class="form-check-label" for="sidebar-color-light">Light</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark"
                        onchange="document.body.setAttribute('data-sidebar', 'dark')">
                    <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand" value="brand"
                        onchange="document.body.setAttribute('data-sidebar', 'brand')">
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

    <!-- pace js -->
  <!-- Pace JS -->

 

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const addFreightBillBtn = document.getElementById("addFreightBillBtn");
            const backToListBtn = document.getElementById("backToListBtn");
            const backToListFromView = document.getElementById("backToListFromView");
            const addForm = document.querySelector(".add.form");
            const listingForm = document.querySelector(".listing-form");
            const viewForm = document.querySelector(".view-form");

            // Initially, show only the listing form
            addForm.style.display = "none";
            viewForm.style.display = "none";

            // Show Add Form
            addFreightBillBtn.addEventListener("click", function () {
                addForm.style.display = "block";
                listingForm.style.display = "none";
                viewForm.style.display = "none";
            });

            // Back to Listing from Add Form
            backToListBtn.addEventListener("click", function () {
                addForm.style.display = "none";
                listingForm.style.display = "block";
                viewForm.style.display = "none";
            });

            // Back to Listing from View Form
            backToListFromView.addEventListener("click", function () {
                addForm.style.display = "none";
                listingForm.style.display = "block";
                viewForm.style.display = "none";
            });

            // View Button Functionality
            document.querySelectorAll(".view-btn").forEach(button => {
                button.addEventListener("click", function () {
                    const row = this.closest("tr"); // Get the row of the clicked button
                    document.getElementById("viewOrderId").textContent = row.children[1].textContent;
                    document.getElementById("viewConsignmentNo").textContent = row.children[2].textContent;
                    document.getElementById("viewConsignor").textContent = row.children[3].textContent;
                    document.getElementById("viewConsignee").textContent = row.children[4].textContent;
                    document.getElementById("viewDate").textContent = row.children[5].textContent;
                    document.getElementById("viewFrom").textContent = row.children[6].textContent;
                    document.getElementById("viewTo").textContent = row.children[7].textContent;

                    // Show View Section, Hide Others
                    addForm.style.display = "none";
                    listingForm.style.display = "none";
                    viewForm.style.display = "block";
                });
            });
        });

    </script>

@endsection