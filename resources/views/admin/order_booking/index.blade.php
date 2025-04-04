
@extends('admin.layouts.app')
@section('title', 'Order | KRL')
@section('content')

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Order Booking</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Order Booking</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Order Booking listing Page -->
                    <div class="row listing-form">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title">📦 Order Booking</h4>
                                        <p class="card-title-desc">View, edit, or delete order details below.</p>
                                    </div>
                                    <button class="btn" id="addOrderBtn"
                                        style="background-color: #ca2639; color: white; border: none;">
                                        <i class="fas fa-plus"></i> Add Order Booking
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Order ID</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="order-row" data-id="1">
                                                <td>1</td>
                                                <td>ORD123456</td>
                                                <td>Electronics shipment</td>
                                                <td>2025-03-28</td>
                                                <td><span class="badge bg-success">Confirmed</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-light view-btn"><i
                                                            class="fas fa-eye text-primary"></i></button>
                                                          
                                                            
                                                    <button class="btn btn-sm btn-light edit-btn"><i
                                                            class="fas fa-pen text-warning"></i></button>
                                                    <button class="btn btn-sm btn-light delete-btn"><i
                                                            class="fas fa-trash text-danger"></i></button>
                                                </td>
                                            </tr>
                                            <tr class="order-row" data-id="1">
                                                <td>2</td>
                                                <td>ORD123456</td>
                                                <td>Sunpharma Order</td>
                                                <td>2025-03-28</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-light view-btn"><i
                                                            class="fas fa-eye text-primary"></i></button>
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
                    <!-- Order Booking Add Page -->
                    <div class="row order-booking-form">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4>🛒 Order Details Add</h4>
                                        <p class="mb-0">Enter the required details for the order.</p>
                                    </div>
                                    <button class="btn" id="backToListBtn"
                                        style="background-color: #ca2639; color: white; border: none;">
                                        ⬅ Back to Listing
                                    </button>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <!-- Order ID -->
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">📌 Order ID</label>
                                                <input type="text" class="form-control" placeholder="Enter Order ID">
                                            </div>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">📝 Description</label>
                                                <textarea class="form-control" rows="2"
                                                    placeholder="Enter order description"></textarea>
                                            </div>
                                        </div>

                                        <!-- Date -->
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">📅 Date</label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>

                                          <!-- Status -->
                                          <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">📊 Status</label>
                                                <select class="form-select">
                                                    <option selected>Select Status</option>
                                                    <option>Pending</option>
                                                    <option>Processing</option>
                                                    <option>Completed</option>
                                                    <option>Cancelled</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                    
                                    <!-- Button to Add LR - Consignment -->
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <!-- <button class="btn btn-primary" id="addLRBtn">➕ Add LR -
                                                Consignment</button> -->
                                            <button class="btn" id="addLRBtn"
                                                style="background-color: #ca2639; color: white; border: none;">
                                                <i class="fas fa-plus"></i> Add LR -
                                                Consignment
                                            </button>
                                        </div>
                                    </div>

                                    <!-- LR Consignment Section (Initially Hidden) -->
                                    <div class="mt-4 " id="lrSection" style="display: none;">
                                        <h4 class="" style="margin-bottom: 2%;">🚚 Add LR - Consignment Details</h4>
                                        <div class="accordion" id="lrAccordion"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- View Order Details Page -->
                    <div class="view-order-form d-none">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h4>🛒 Order Details View</h4>
                                    <p class="mb-0">View Order details for the order.</p>
                                </div>
                                <button class="btn" id="backToListBtn"
                                    style="background-color: #ca2639; color: white; border: none;">
                                    ⬅ Back to Listing
                                </button>
                            </div>
                            <div class="card-body">
                                <p><strong>📌 Order ID:</strong> <span id="viewOrderId"></span></p>
                                <p><strong>📝 Description:</strong> <span id="viewOrderDesc"></span></p>
                                <p><strong>📅 Date:</strong> <span id="viewOrderDate"></span></p>
                                <p><strong>📊 Status:</strong> <span id="viewOrderStatus"></span></p>
                            </div>
                        </div>
                    </div>
                    


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
                        <input class="form-check-input" type="radio" name="layout" id="layout-vertical"
                            value="vertical">
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
                        <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark"
                            value="dark">
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
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-scrollable" value="scrollable"
                            onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light"
                            value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark"
                            value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
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
        <script src="assets/libs/jquery/jquery.min.js"></script>
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

        <script src="assets/js/app.js"></script>

        <!-- add form and back  -->

        <script>
     document.addEventListener("DOMContentLoaded", function () {
    // Get elements
    const addOrderBtn = document.getElementById("addOrderBtn");
    const backToListBtn = document.getElementById("backToListBtn");
    const listingForm = document.querySelector(".listing-form");
    const orderBookingForm = document.querySelector(".order-booking-form");
    const viewOrderForm = document.querySelector(".view-order-form");

    // Elements inside the view-order-form (Ensure you have these IDs in HTML)
    const viewOrderId = document.getElementById("viewOrderId");
    const viewOrderDesc = document.getElementById("viewOrderDesc");
    const viewOrderDate = document.getElementById("viewOrderDate");
    const viewOrderStatus = document.getElementById("viewOrderStatus");

    // Function to switch views
    function showForm(showElement) {
        [listingForm, orderBookingForm, viewOrderForm].forEach(form => {
            if (form) form.classList.add("d-none"); // Hide all forms
        });
        if (showElement) showElement.classList.remove("d-none"); // Show selected form
    }

    // Initially, show only listing form
    showForm(listingForm);

    // Show order booking form
    if (addOrderBtn) {
        addOrderBtn.addEventListener("click", function () {
            showForm(orderBookingForm);
        });
    }

    // Attach event listener to dynamically created "View" buttons
    document.addEventListener("click", function (event) {
        const viewBtn = event.target.closest(".view-btn");
        if (viewBtn) {
            // Find the closest row to extract order details
            const row = viewBtn.closest("tr");
            if (row) {
                const orderId = row.querySelector(".order-id")?.textContent || "N/A";
                const orderDesc = row.querySelector(".order-desc")?.textContent || "No description";
                const orderDate = row.querySelector(".order-date")?.textContent || "No date";
                const orderStatus = row.querySelector(".order-status")?.textContent || "Unknown";

                // Populate view form with data
                if (viewOrderId) viewOrderId.textContent = orderId;
                if (viewOrderDesc) viewOrderDesc.textContent = orderDesc;
                if (viewOrderDate) viewOrderDate.textContent = orderDate;
                if (viewOrderStatus) viewOrderStatus.textContent = orderStatus;
            }

            // Show the view order form
            showForm(viewOrderForm);
        }
    });

    // Show listing form on clicking "Back to Listing"
    if (backToListBtn) {
        backToListBtn.addEventListener("click", function () {
            showForm(listingForm);
        });
    }
});

        </script>

        <!-- JavaScript to Add & Remove LR Consignments -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let lrCounter = 0;
                const addLRBtn = document.getElementById("addLRBtn");
                const lrAccordion = document.getElementById("lrAccordion");
                const lrSection = document.getElementById("lrSection");

                function createLRAccordionItem(counter) {
                    const newAccordionItem = document.createElement("div");
                    newAccordionItem.classList.add("accordion-item");
                    newAccordionItem.setAttribute("id", `lrItem${counter}`);
                    newAccordionItem.innerHTML = `
    <h2 class="accordion-header" id="heading${counter}">
        <button class="accordion-button btn-light"  type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse${counter}" aria-expanded="true" aria-controls="collapse${counter}">
            LR - Consignment #${counter}
        </button>
    </h2>
    <div id="collapse${counter}" class="accordion-collapse collapse show" aria-labelledby="heading${counter}"
        data-bs-parent="#lrAccordion">
        <div class="accordion-body">
           <div class="card-body">
                                    <div class="row">
                                        <!-- Consignor Details -->
                                        <div class="col-md-6">
                                            <h5>📦 Consignor (Sender)</h5>
                                            <div class="mb-3">
                                                <label class="form-label">Consignor Name</label>
                                                <input type="text" class="form-control" placeholder="Enter sender's name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Multiple Addresses</label>
                                                <textarea class="form-control" rows="2" placeholder="Enter all addresses"></textarea>
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
                                                <input type="text" class="form-control" placeholder="Enter receiver's name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Multiple Addresses</label>
                                                <textarea class="form-control" rows="2" placeholder="Enter all addresses"></textarea>
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
                                                    <option selected="">Select Type</option>
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
                                                    <input class="form-check-input" type="radio" name="vehicle" checked="">
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
                                                    <option selected="">Select Mode</option>
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
                                                    <option selected="">Select Origin</option>
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
                                                    <option selected="">Select Destination</option>
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
                                                    <input class="form-check-input" type="radio" name="documentation" id="singleDoc" checked="">
                                                    <label class="form-check-label" for="singleDoc">Single
                                                        Document</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="documentation" id="multipleDoc">
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
                                                            <td><input type="number" class="form-control" placeholder="0"></td>
                                                            <td>
                                                                <select class="form-select">
                                                                    <option>Pallets</option>
                                                                    <option>Cartons</option>
                                                                    <option>Bags</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control" placeholder="Enter description"></td>
                                                            <td><input type="number" class="form-control" placeholder="0"></td>
                                                            <td><input type="number" class="form-control" placeholder="0"></td>
                                                            <td><input type="text" class="form-control" placeholder="Doc No."></td>
                                                            <td><input type="text" class="form-control" placeholder="Doc Name"></td>
                                                            <td><input type="date" class="form-control"></td>
                                                            <td><input type="text" class="form-control" placeholder="Eway Bill No."></td>
                                                            <td><input type="date" class="form-control"></td>
                                                            <td>
                                                                <button class="btn btn-danger btn-sm" onclick="removeRow(this)">🗑</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- Add Row Button -->
                                            <div class="text-end mt-2">
                                                <button class="btn  btn-sm" style="background: #ca2639; color: white;" onclick="addRow()">
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
                                                    <input class="form-check-input" type="radio" name="freightType" id="freightPaid" checked="">
                                                    <label class="form-check-label" for="freightPaid">Paid</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="freightType" id="freightToPay">
                                                    <label class="form-check-label" for="freightToPay">To Pay</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="freightType" id="freightToBeBilled">
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
                                                            <td><input type="number" class="form-control" placeholder="Enter Freight Amount"></td>
                                                            <td><input type="number" class="form-control" placeholder="Enter LR Charges"></td>
                                                            <td><input type="number" class="form-control" placeholder="Enter Hamali Charges"></td>
                                                            <td><input type="number" class="form-control" placeholder="Enter Other Charges"></td>
                                                            <td><input type="number" class="form-control" placeholder="Enter GST Amount"></td>
                                                            <td><input type="number" class="form-control" placeholder="Total Freight" readonly=""></td>
                                                            <td><input type="number" class="form-control" placeholder="Less Advance Amount"></td>
                                                            <td><input type="number" class="form-control" placeholder="Balance Freight Amount" readonly=""></td>
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
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-eye"></i> Preview LR / Consignment
                                            </button>
                                        </div>

                                    </div>
                                </div>
           <div class="d-flex justify-content-end gap-2 mt-3">
    <button class="btn btn-outline-warning btn-sm removeLRBtn" data-id="lrItem${counter}">
        <i class="fas fa-trash-alt"></i> Remove
    </button>
    <button class="btn  btn-sm addMoreLRBtn" data-id="lrItem${counter}" style="border-color: #ca2639;     background-color: #ca2639;color: #fff;">
        <i class="fas fa-plus-circle"></i> Add More LR - Consignment
    </button>
</div>

        </div>
    </div>
`;
                    return newAccordionItem;
                }

                function addNewLR() {
                    lrCounter++;
                    lrSection.style.display = "block"; // Show LR Section
                    const newAccordionItem = createLRAccordionItem(lrCounter);
                    lrAccordion.appendChild(newAccordionItem);

                    // Attach Event Listeners
                    newAccordionItem.querySelector(".removeLRBtn").addEventListener("click", function () {
                        removeLR(this.getAttribute("data-id"));
                    });
                    newAccordionItem.querySelector(".addMoreLRBtn").addEventListener("click", addNewLR);
                }

                function removeLR(removeId) {
                    document.getElementById(removeId).remove();

                    // If No LR Left, Hide the Section
                    if (lrAccordion.children.length === 0) {
                        lrSection.style.display = "none";
                    }
                }

                addLRBtn.addEventListener("click", addNewLR);
            });
        </script>





@endsection