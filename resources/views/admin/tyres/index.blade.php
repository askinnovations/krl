@extends('admin.layouts.app')
@section('title', 'Tyres | KRL')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tyres</h4>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show auto-dismiss" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show auto-dismiss" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Tyres</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- Tyre Listing Page -->
            <div class="row listing-form">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>

                                <h4 class="card-title">🛞 Tyre Listing</h4>
                                <p class="card-title-desc">
                                    View, edit, or delete tyre details below. This table supports search,
                                    sorting, and pagination via DataTables.
                                </p>
                            </div>
                            <button class="btn" id="addTyreBtn"
                                style="background-color: #ca2639; color: white; border: none;">
                                <i class="fas fa-plus"></i> Add Tyre
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Company</th>
                                        <th>Make & Model</th>
                                        <th>Tyre Number</th>
                                        <th>Description</th>
                                        <th>Format</th>
                                        <th>Health Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($tyres as $tyre)
                                        <tr>
                                            <td>{{ $loop->iteration  }}</td>
                                            <td>{{ $tyre->company }}</td>
                                            <td>{{ $tyre->make_model }}</td>
                                            <td>{{ $tyre->tyre_number }}</td>
                                            <td>{{ $tyre->description }}</td>
                                            <td>{{ $tyre->format }}</td>

                                            <td><span class="badge bg-success">{{ $tyre->tyre_health }}</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-light view-btn" data-bs-toggle="modal"
                                                    data-bs-target="#viewTyreModal">
                                                    <i class="fas fa-eye text-primary"></i>
                                                </button>
                                              


                                                <button class="btn btn-sm btn-light edit-btn" data-bs-toggle="modal"
                                                    data-bs-target="#updateTyreModal" data-id="{{ $tyre->id }}">
                                                    <i class="fas fa-pen text-warning"></i>
                                                </button>

                                                <button class="btn btn-sm btn-light delete-btn"><a
                                                        href="{{ route('admin.tyres.delete', $tyre->id) }}"> <i
                                                            class="fas fa-trash text-danger"></i>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- view model --}}
            <div class="modal fade" id="viewTyreModal" tabindex="-1" aria-labelledby="viewTyreModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewTyreModalLabel">Tyre Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>🏢 Company:</strong> <span id="viewCompany"></span></p>
                            <p><strong>🔩 Make & Model:</strong> <span id="viewModel"></span></p>
                            <p><strong>📄 Description:</strong> <span id="viewDescription"></span></p>
                            <p><strong>📏 Format:</strong> <span id="viewFormat"></span></p>
                            <p><strong>🆔 Tyre Number:</strong> <span id="viewTyreNumber"></span></p>
                            <p><strong>📊 Health Status:</strong> <span id="viewHealth"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Tyre Modal -->
            <div class="modal fade" id="addTyreModal" tabindex="-1" aria-labelledby="addTyreModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTyreModalLabel">🛞 Add Tyre</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.tyres.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">🏢 Company</label>
                                        <input type="text" class="form-control" id="inputCompany"
                                            placeholder="Enter tyre company" name="company" required>
                                        @error('company')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">🔩 Make & Model</label>
                                        <input type="text" class="form-control" id="inputModel"
                                            placeholder="Enter make & model" name="make_model" required>
                                        @error('make_model')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">📄 Tyre Description</label>
                                        <input type="text" class="form-control" id="inputDescription"
                                            placeholder="Enter description" name="description" required>
                                        @error('description')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">📏 Format</label>
                                        <input type="text" class="form-control" id="inputFormat" placeholder="Enter format"
                                            name="format" required>
                                        @error('format')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">🆔 Tyre Number</label>
                                        <input type="text" class="form-control" id="inputTyreNumber"
                                            placeholder="Enter tyre number" name="tyre_number" required>
                                        @error('tyre_number')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">📊 Tyre Health</label>
                                        <select class="form-control" id="inputHealth" name="tyre_health">
                                            <option value="">Select health status</option>
                                            <option value="new">New</option>
                                            <option value="good">Good</option>
                                            <option value="worn_out">Worn Out</option>
                                            <option value="needs_replacement">Needs Replacement</option>
                                        </select>
                                        @error('tyre_health')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Add
                                        Tyre</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- //update tyre model --}}
            <div class="modal fade" id="updateTyreModal" tabindex="-1" aria-labelledby="updateTyreModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateTyreModalLabel">🛞 Update Tyre</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" action="{{ route('admin.tyres.update', '__ID__') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">🏢 Company</label>
                                        <input type="text" class="form-control" placeholder="Enter tyre company"
                                            id="editCompany" name="company" required>
                                        @error('company')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">🔩 Make & Model</label>
                                        <input type="text" class="form-control" placeholder="Enter make & model"
                                            id="editModel" name="make_model" required>
                                        @error('make_model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">📄 Tyre Description</label>
                                        <input type="text" class="form-control" placeholder="Enter description"
                                            id="editDescription" name="description" required>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">📏 Format</label>
                                        <input type="text" class="form-control" placeholder="Enter format" id="editFormat"
                                            name="format" required>
                                        @error('format')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">🆔 Tyre Number</label>
                                        <input type="text" class="form-control" placeholder="Enter tyre number"
                                            id="editTyreNumber" name="tyre_number" required>
                                        @error('tyre_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">📊 Tyre Health</label>
                                        <select class="form-control" id="editHealth" name="tyre_health">
                                            <option value="">Select health status</option>
                                            <option value="new">New</option>
                                            <option value="good">Good</option>
                                            <option value="worn_out">Worn Out</option>
                                            <option value="needs_replacement">Needs Replacement</option>
                                        </select>
                                        @error('tyre_health')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update Tyre</button>
                                </div>
                            </form>
                        </div>
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
    <div class="rightbar-overlay"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Edit Button Click Handler
            document.querySelectorAll('[data-bs-target="#updateTyreModal"]').forEach(button => {
                button.addEventListener('click', function () {
                    const row = this.closest('tr');

                    // Populate form fields
                    document.getElementById('editCompany').value = row.cells[1].textContent;
                    document.getElementById('editModel').value = row.cells[2].textContent;
                    document.getElementById('editTyreNumber').value = row.cells[3].textContent;
                    document.getElementById('editDescription').value = row.cells[4].textContent;
                    document.getElementById('editFormat').value = row.cells[5].textContent;
                    document.getElementById('editHealth').value = row.cells[6].textContent.trim();

                    // Update form action with record ID
                    const form = document.querySelector('#updateTyreModal form');
                    form.action = `/admin/tyres/${this.dataset.id}`;
                });
            });

            // Add hidden input for PUT method
            const form = document.querySelector('#updateTyreModal form');
            form.innerHTML += '<input type="hidden" name="_method" value="PUT">';
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let editForm = document.getElementById("editForm");

            function setEditId(tyreId) {
                let formAction = "{{ route('admin.tyres.update', '__ID__') }}".replace('__ID__', tyreId);
                editForm.setAttribute("action", formAction);
            }

            document.querySelectorAll(".edit-button").forEach(button => {
                button.addEventListener("click", function () {
                    let tyreId = this.getAttribute("data-id"); // Get ID from data attribute
                    setEditId(tyreId);
                });
            });
        });

    </script>


    <script>
      
    
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".view-btn").forEach(button => {
            button.addEventListener("click", function () {
                let row = button.closest("tr");
       alert(row);
                document.getElementById("viewCompany").textContent = row.cells[1].textContent;
                document.getElementById("viewModel").textContent = row.cells[2].textContent;
                document.getElementById("viewTyreNumber").textContent = row.cells[3].textContent;
                document.getElementById("viewDescription").textContent = row.cells[4].textContent;
                document.getElementById("viewFormat").textContent = row.cells[5].textContent;
                document.getElementById("viewHealth").textContent = row.cells[6].textContent;

                var viewModal = new bootstrap.Modal(document.getElementById("viewTyreModal"));
                viewModal.show();
               
            });
        });
    });
</script>








    // Function to attach delete event
    function attachDeleteEvent(button) {
    button.addEventListener("click", function () {
    if (confirm("Are you sure you want to delete this tyre?")) {
    button.closest("tr").remove();
    }
    });
    }

    // Function to get badge class based on health status
    function getHealthBadgeClass(health) {
    switch (health) {
    case "New":
    return "bg-success text-white"; // Green
    case "Good":
    return "bg-primary text-white"; // Blue
    case "Worn Out":
    return "bg-warning text-dark"; // Yellow
    case "Needs Replacement":
    return "bg-danger text-white"; // Red
    default:
    return "bg-secondary text-white"; // Gray (default)
    }
    }

    // Attach existing buttons on page load
    document.querySelectorAll(".view-btn").forEach(attachViewEvent);
    document.querySelectorAll(".delete-btn").forEach(attachDeleteEvent);

    // Show add tyre modal
    document.getElementById("addTyreBtn").addEventListener("click", function () {
    var addTyreModal = new bootstrap.Modal(document.getElementById("addTyreModal"));
    addTyreModal.show();
    });
    document.getElementById("updateTyreBtn").addEventListener("click", function () {
    var updateTyreBtnTyreModal = new bootstrap.Modal(document.getElementById("updateTyreModal"));
    updateTyreModal.show();
    });

    // Handle saving tyre
    document.getElementById("saveTyre").addEventListener("click", function () {
    let company = document.getElementById("inputCompany").value;
    let model = document.getElementById("inputModel").value;
    let tyreNumber = document.getElementById("inputTyreNumber").value;
    let description = document.getElementById("inputDescription").value;
    let format = document.getElementById("inputFormat").value;
    let health = document.getElementById("inputHealth").value;

    if (company && model && tyreNumber) {
    let table = document.getElementById("datatable").getElementsByTagName("tbody")[0];
    let newRow = table.insertRow();

    let badgeClass = getHealthBadgeClass(health);

    newRow.innerHTML = `
    <td>${table.rows.length}</td>
    <td>${company}</td>
    <td>${model}</td>
    <td>${tyreNumber}</td>
    <td>${description}</td>
    <td>${format}</td>
    <td><span class="badge ${badgeClass} p-1">${health}</span></td>
    <td>
        <button class="btn btn-sm btn-light view-btn">
            <i class="fas fa-eye text-primary"></i>
        </button>
        <button class="btn btn-sm btn-light edit-btn">
            <i class="fas fa-pen text-warning"></i>
        </button>
        <button class="btn btn-sm btn-light delete-btn">
            <i class="fas fa-trash text-danger"></i>
        </button>
    </td>`;

    // Attach events to new buttons
    attachViewEvent(newRow.querySelector(".view-btn"));
    attachDeleteEvent(newRow.querySelector(".delete-btn"));

    // Clear input fields
    document.getElementById("inputCompany").value = "";
    document.getElementById("inputModel").value = "";
    document.getElementById("inputTyreNumber").value = "";
    document.getElementById("inputDescription").value = "";
    document.getElementById("inputFormat").value = "";
    document.getElementById("inputHealth").value = "Select health status";

    // Hide the modal
    let modal = bootstrap.Modal.getInstance(document.getElementById("addTyreModal"));
    modal.hide();
    } else {
    alert("Please fill all required fields.");
    }
    });
    });

    </script>

@endsection