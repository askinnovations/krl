
@extends('admin.layouts.app')
@section('title', 'Consignment Note | KRL')
@section('content')
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">LR / Consignment Note</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">LR / Consignment Note</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <!-- LR / Consignment add Form -->
                    <div class="row add-form" style="display: none;">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4>🚚 Add LR / Consignment</h4>
                                        <p class="mb-0">Fill in the required details for shipment and delivery.</p>
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
                                                <label class="form-label">Consignor Name</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter sender's name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Multiple Addresses</label>
                                                <textarea class="form-control" rows="2"
                                                    placeholder="Enter all addresses"></textarea>
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
                                                <label class="form-label">Consignee Name</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter receiver's name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Multiple Addresses</label>
                                                <textarea class="form-control" rows="2"
                                                    placeholder="Enter all addresses"></textarea>
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

                                    <!-- Cargo Description Section -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h5 class="mb-3 pb-3">📦 Cargo Description</h5>

                                            <!-- Documentation Selection -->
                                            <div class="mb-3 d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="documentation"
                                                        id="singleDoc" checked>
                                                    <label class="form-check-label" for="singleDoc">Single
                                                        Document</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="documentation"
                                                        id="multipleDoc">
                                                    <label class="form-check-label" for="multipleDoc">Multiple
                                                        Documents</label>
                                                </div>
                                            </div>

                                            <!-- Cargo Details Table -->
                                            <div class="table-responsive">
                                                <table class="table table-bordered align-middle text-center">
                                                    <thead class="">
                                                        <tr>
                                                            <th>No. of Packages</th>
                                                            <th>Packaging Type</th>
                                                            <th>Description</th>
                                                            <th>Actual Weight (kg)</th>
                                                            <th>Charged Weight (kg)</th>
                                                            <th>Document No.</th>
                                                            <th>Document Name</th>
                                                            <th>Document Date</th>
                                                            <th>Eway Bill</th>
                                                            <th>Valid Upto</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="cargoTableBody">
                                                        <tr>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="0"></td>
                                                            <td>
                                                                <select class="form-select">
                                                                    <option>Pallets</option>
                                                                    <option>Cartons</option>
                                                                    <option>Bags</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control"
                                                                    placeholder="Enter description"></td>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="0"></td>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="0"></td>
                                                            <td><input type="text" class="form-control"
                                                                    placeholder="Doc No."></td>
                                                            <td><input type="text" class="form-control"
                                                                    placeholder="Doc Name"></td>
                                                            <td><input type="date" class="form-control"></td>
                                                            <td><input type="text" class="form-control"
                                                                    placeholder="Eway Bill No."></td>
                                                            <td><input type="date" class="form-control"></td>
                                                            <td>
                                                                <button class="btn btn-danger btn-sm"
                                                                    onclick="removeRow(this)">🗑</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- Add Row Button -->
                                            <div class="text-end mt-2">
                                                <button class="btn  btn-sm" style="background: #ca2639; color: white;"
                                                    onclick="addRow()">
                                                    <span style="filter: invert(1);">➕</span> Add Row
                                                </button>
                                            </div>





                                        </div>
                                    </div>

                                    <!-- Freight Details Section -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h5 class=" pb-3">🚚 Freight Details</h5>

                                            <!-- Freight Type Selection -->
                                            <div class="mb-3 d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="freightType"
                                                        id="freightPaid" checked>
                                                    <label class="form-check-label" for="freightPaid">Paid</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="freightType"
                                                        id="freightToPay">
                                                    <label class="form-check-label" for="freightToPay">To Pay</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="freightType"
                                                        id="freightToBeBilled">
                                                    <label class="form-check-label" for="freightToBeBilled">To Be
                                                        Billed</label>
                                                </div>
                                            </div>

                                            <!-- Freight Charges Table -->
                                            <div class="table-responsive">
                                                <table class="table table-bordered align-middle text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Freight</th>
                                                            <th>LR Charges</th>
                                                            <th>Hamali</th>
                                                            <th>Other Charges</th>
                                                            <th>GST</th>
                                                            <th>Total Freight</th>
                                                            <th>Less Advance</th>
                                                            <th>Balance Freight</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="Enter Freight Amount"></td>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="Enter LR Charges"></td>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="Enter Hamali Charges"></td>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="Enter Other Charges"></td>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="Enter GST Amount"></td>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="Total Freight" readonly></td>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="Less Advance Amount"></td>
                                                            <td><input type="number" class="form-control"
                                                                    placeholder="Balance Freight Amount" readonly></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <!-- Declared Value -->
                                        <div class="col-md-6 mt-3">
                                            <div class="mb-3">
                                                <label class="form-label " style="font-weight: bold;">💰 Declared Value
                                                    (Rs.)</label>
                                                <input type="number" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Submit Button -->
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-eye"></i> Preview LR / Consignment
                                            </button>
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
                                        <h4 class="card-title">🚚 LR / Consignment Listing</h4>
                                        <p class="card-title-desc">View, edit, or delete consignment details below.</p>
                                    </div>
                                    <button class="btn" id="addLrBtn"
                                        style="background-color: #ca2639; color: white; border: none;">
                                        <i class="fas fa-plus"></i> Add LR / Consignment
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
                                                    <button class="btn btn-sm btn-light toggle-details"><i
                                                            class="fas fa-eye text-primary"></i></button>
                                                    <button class="btn btn-sm btn-light download-btn"><i
                                                            class="fas fa-download" style="color: green;"></i></button>
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

                    <!-- Detailed Consignment View -->
                    <div class="row detailed-view" style="display: none;">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4>📜 Consignment Details</h4>
                                    <button class="btn btn-danger" id="backToListBtn">⬅ Back to Listing</button>
                                </div>
                                <div class="card-body">
                                    <h5>📦 Cargo Details</h5>
                                    <table class="table table-bordered">
                                        <tbody id="cargoDetails">
                                            <!-- Dynamic cargo details will be inserted here -->
                                        </tbody>
                                    </table>
                                    <h5>💰 Freight Details</h5>
                                    <table class="table table-bordered">
                                        <tbody id="freightDetails">
                                            <!-- Dynamic freight details will be inserted here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const addForm = document.querySelector(".add-form");
                            const listingForm = document.querySelector(".listing-form");
                            const detailedView = document.querySelector(".detailed-view");
                            const addLrBtn = document.getElementById("addLrBtn");
                            const backToListBtn = document.getElementById("backToListBtn");
                            const viewButtons = document.querySelectorAll(".toggle-details");
                            const cargoDetails = document.getElementById("cargoDetails");
                            const freightDetails = document.getElementById("freightDetails");

                            addLrBtn.addEventListener("click", function () {
                                addForm.style.display = "block";
                                listingForm.style.display = "none";
                                detailedView.style.display = "none";
                            });

                            backToListBtn.addEventListener("click", function () {
                                detailedView.style.display = "none";
                                listingForm.style.display = "block";
                                addForm.style.display = "none";
                            });

                            viewButtons.forEach(button => {
                                button.addEventListener("click", function () {
                                    const row = this.closest("tr");
                                    const consignmentId = row.getAttribute("data-id");

                                    const consignmentData = {
                                        consignmentNo: row.children[1].textContent,
                                        consignor: row.children[2].textContent,
                                        consignee: row.children[3].textContent,
                                        date: row.children[4].textContent,
                                        from: row.children[5].textContent,
                                        to: row.children[6].textContent,
                                        cargoDescription: "Electronics",
                                        numPackages: "10",
                                        packagingType: "Carton Boxes",
                                        actualWeight: "500",
                                        chargedWeight: "550",
                                        cargoType: "General Cargo",
                                        deliveryMode: "Express",
                                        freightType: "Paid",
                                        freightAmount: "₹5,000",
                                        lrCharges: "₹200",
                                        hamali: "₹300",
                                        otherCharges: "₹150",
                                        gst: "₹900",
                                        totalFreight: "₹6,550",
                                        lessAdvance: "₹2,000",
                                        balanceFreight: "₹4,550"
                                    };

                                    cargoDetails.innerHTML = `
                    <tr><th>Consignment No:</th><td>${consignmentData.consignmentNo}</td></tr>
                    <tr><th>Consignor:</th><td>${consignmentData.consignor}</td></tr>
                    <tr><th>Consignee:</th><td>${consignmentData.consignee}</td></tr>
                    <tr><th>Date:</th><td>${consignmentData.date}</td></tr>
                    <tr><th>From:</th><td>${consignmentData.from}</td></tr>
                    <tr><th>To:</th><td>${consignmentData.to}</td></tr>
                    <tr><th>Cargo Description:</th><td>${consignmentData.cargoDescription}</td></tr>
                    <tr><th>No. of Packages:</th><td>${consignmentData.numPackages}</td></tr>
                    <tr><th>Packaging Type:</th><td>${consignmentData.packagingType}</td></tr>
                    <tr><th>Actual Weight (kg):</th><td>${consignmentData.actualWeight}</td></tr>
                    <tr><th>Charged Weight (kg):</th><td>${consignmentData.chargedWeight}</td></tr>
                    <tr><th>Cargo Type:</th><td>${consignmentData.cargoType}</td></tr>
                    <tr><th>Delivery Mode:</th><td>${consignmentData.deliveryMode}</td></tr>
                `;

                                    freightDetails.innerHTML = `
                    <tr><th>Freight Type:</th><td>${consignmentData.freightType}</td></tr>
                    <tr><th>Freight Amount:</th><td>${consignmentData.freightAmount}</td></tr>
                    <tr><th>LR Charges:</th><td>${consignmentData.lrCharges}</td></tr>
                    <tr><th>Hamali:</th><td>${consignmentData.hamali}</td></tr>
                    <tr><th>Other Charges:</th><td>${consignmentData.otherCharges}</td></tr>
                    <tr><th>GST:</th><td>${consignmentData.gst}</td></tr>
                    <tr><th>Total Freight:</th><td>${consignmentData.totalFreight}</td></tr>
                    <tr><th>Less Advance:</th><td>${consignmentData.lessAdvance}</td></tr>
                    <tr><th>Balance Freight:</th><td>${consignmentData.balanceFreight}</td></tr>
                `;

                                    detailedView.style.display = "block";
                                    listingForm.style.display = "none";
                                });
                            });
                        });
                    </script>





                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


          
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
    <script>
        function addRow() {
            let table = document.getElementById('cargoTableBody');
            let newRow = table.rows[0].cloneNode(true);
            table.appendChild(newRow);
        }

        function removeRow(button) {
            let row = button.parentElement.parentElement;
            if (document.getElementById('cargoTableBody').rows.length > 1) {
                row.remove();
            }
        }
    </script>


</body>

</html>