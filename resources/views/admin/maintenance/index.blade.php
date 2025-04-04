@extends('admin.layouts.app')
@section('title', ' Maintenance | KRL')
@section('content')
       
      
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Maintenance</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Maintenance</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <!-- Maintenance Listing Page -->
                    <div class="row listing-form">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title">🛠️ Maintenance Listing</h4>
                                        <p class="card-title-desc">
                                            View, edit, or delete maintenance records below. This table supports search,
                                            sorting, and pagination via DataTables.
                                        </p>
                                    </div>
                                    <button class="btn" id="addMaintenanceBtn"
                                        style="background-color: #ca2639; color: white; border: none;"
                                        data-bs-toggle="modal" data-bs-target="#addMaintenanceModal">
                                        <i class="fas fa-plus"></i> Add Maintenance
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Vehicle</th>
                                                <th>Category</th>
                                                <th>Vendor</th>
                                                <th>Odometer Reading</th>
                                                <th>Autoparts</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Maintenance Modal -->
                    <div id="addMaintenanceModal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">➕ Add Maintenance</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addMaintenanceForm">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">🚗 Vehicle</label>
                                                <select class="form-control" id="addVehicle" required>
                                                    <option>Select Vehicle</option>
                                                    <option>Truck A</option>
                                                    <option>Truck B</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">📌 Category</label>
                                                <select class="form-control" id="addCategory" required>
                                                    <option>Select Category</option>
                                                    <option>Routine Check</option>
                                                    <option>Major Repair</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">🏢 Vendor</label>
                                                <select class="form-control" id="addVendor" required>
                                                    <option>Select Vendor</option>
                                                    <option>Service Center</option>
                                                    <option>Mechanic</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">📏 Odometer Reading</label>
                                                <input type="text" class="form-control" id="addOdometer" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">🔩 Autoparts</label>
                                                <div id="autopartsContainer">
                                                    <div class="row mb-2 autopart-item">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Part Name">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control"
                                                                placeholder="Part ID">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="number" class="form-control"
                                                                placeholder="Quantity">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-secondary mt-2"
                                                    id="addAutopartBtn">Add Another Part</button>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View Maintenance Modal -->
                    <div id="viewMaintenanceModal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">🔍 View Maintenance Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>🚗 Vehicle:</strong> <span id="viewVehicle"></span></p>
                                    <p><strong>📌 Category:</strong> <span id="viewCategory"></span></p>
                                    <p><strong>🏢 Vendor:</strong> <span id="viewVendor"></span></p>
                                    <p><strong>📏 Odometer Reading:</strong> <span id="viewOdometer"></span></p>
                                    <p><strong>🔩 Autoparts:</strong> <span id="viewAutoparts"></span></p>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("addAutopartBtn").addEventListener("click", function () {
                let container = document.getElementById("autopartsContainer");
                let newPart = document.createElement("div");
                newPart.classList.add("row", "mb-2", "autopart-item");
                newPart.innerHTML = `
<div class="col-md-4">
<input type="text" class="form-control part-name" placeholder="Part Name" required>
</div>
<div class="col-md-4">
<input type="text" class="form-control part-id" placeholder="Part ID" required>
</div>
<div class="col-md-4">
<input type="number" class="form-control part-quantity" placeholder="Quantity" required>
</div>`;
                container.appendChild(newPart);
            });

            document.getElementById("addMaintenanceForm").addEventListener("submit", function (event) {
                event.preventDefault(); // Prevent default form submission

                let vehicle = document.getElementById("addVehicle").value;
                let category = document.getElementById("addCategory").value;
                let vendor = document.getElementById("addVendor").value;
                let odometer = document.getElementById("addOdometer").value;

                // Validate Form Fields
                if (!vehicle || !category || !vendor || !odometer) {
                    alert("Please fill all required fields.");
                    return;
                }

                let autoparts = Array.from(document.querySelectorAll(".autopart-item")).map(item => {
                    let partName = item.querySelector(".part-name").value;
                    let partId = item.querySelector(".part-id").value;
                    let quantity = item.querySelector(".part-quantity").value;
                    return `${partName} (${partId}) x${quantity}`;
                }).join(", ");

                let tbody = document.querySelector("#datatable tbody");
                let id = tbody.rows.length + 1;

                let row = document.createElement("tr");
                row.innerHTML = `
<td>${id}</td>
<td>${vehicle}</td>
<td>${category}</td>
<td>${vendor}</td>
<td>${odometer}</td>
<td>${autoparts}</td>
<td>
<button class="btn btn-sm btn-light view-btn" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal">
    <i class="fas fa-eye text-primary"></i>
</button>
<button class="btn btn-sm btn-light edit-btn">
    <i class="fas fa-pen text-warning"></i>
</button>
<button class="btn btn-sm btn-light delete-btn">
    <i class="fas fa-trash text-danger"></i>
</button>
</td>`;

                tbody.appendChild(row);

                // Reset form fields
                document.getElementById("addMaintenanceForm").reset();

                // Close modal after adding
                let modal = new bootstrap.Modal(document.getElementById("addMaintenanceModal"));
                modal.hide();
            });

            document.addEventListener("click", function (event) {
                // View Maintenance Details
                if (event.target.closest(".view-btn")) {
                    let row = event.target.closest("tr");
                    document.getElementById("viewVehicle").textContent = row.children[1].textContent;
                    document.getElementById("viewCategory").textContent = row.children[2].textContent;
                    document.getElementById("viewVendor").textContent = row.children[3].textContent;
                    document.getElementById("viewOdometer").textContent = row.children[4].textContent;
                    document.getElementById("viewAutoparts").textContent = row.children[5].textContent;
                }

                // Delete Maintenance Record
                if (event.target.closest(".delete-btn")) {
                    event.target.closest("tr").remove();
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const maintenanceData = [
                { id: 1, vehicle: "Truck A", category: "Routine Check", vendor: "Service Center", odometer: "120,000 km", autoparts: "Brake Pad" },
                { id: 2, vehicle: "Truck B", category: "Oil Change", vendor: "Garage XYZ", odometer: "85,000 km", autoparts: "Engine Oil" },
                { id: 3, vehicle: "Van C", category: "Tire Replacement", vendor: "Tire Shop", odometer: "95,500 km", autoparts: "Front Tires" },
                { id: 4, vehicle: "Bus D", category: "Battery Change", vendor: "Battery House", odometer: "150,000 km", autoparts: "New Battery" },
                { id: 5, vehicle: "Car E", category: "Brake Service", vendor: "Auto Care", odometer: "60,000 km", autoparts: "Brake Discs" }
            ];

            const tableBody = document.querySelector("#datatable tbody");

            maintenanceData.forEach(item => {
                const row = document.createElement("tr");
                row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.vehicle}</td>
            <td>${item.category}</td>
            <td>${item.vendor}</td>
            <td>${item.odometer}</td>
            <td>${item.autoparts}</td>
            <td>
                <button class="btn btn-sm btn-light view-btn" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal">
                    <i class="fas fa-eye text-primary"></i>
                </button>
                <button class="btn btn-sm btn-light edit-btn">
                    <i class="fas fa-pen text-warning"></i>
                </button>
                <button class="btn btn-sm btn-light delete-btn">
                    <i class="fas fa-trash text-danger"></i>
                </button>
            </td>
        `;
                tableBody.appendChild(row);
            });
        });

    </script>
@endsection