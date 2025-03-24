@extends('admin.layouts.app')
@section('content')
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Complaint</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Complaints</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Mobile No</th>
                                                    <th>PAN</th>
                                                    <th>GST No</th>
                                                    <th>Aadhar No</th>
                                                    <th>City</th>
                                                    <th>Complaint Description</th>
                                                    <th>State</th>
                                                    <!-- <th>From</th> -->
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($complaints as $index => $complaint)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $complaint->name }}</td>
                                                    <td>{{ $complaint->mobile }}</td>
                                                    <td>{{ $complaint->pan }}</td>
                                                    <td>{{ $complaint->gst_no }}</td>
                                                    <td>{{ $complaint->aadhar_no }}</td>
                                                    <td>{{ $complaint->city }}</td>
                                                    <td>{{ $complaint->description }}</td>
                                                    <td>{{ $complaint->state }}</td>
                                                    <!-- <td>Customer Support</td>  -->
                                                    <td>
                                                    <!-- Edit Button -->
                                                    
                                                        <button class="btn btn-warning btn-sm editBtn" 
                                                                data-id="{{ $complaint->id }}" 
                                                                data-name="{{ $complaint->name }}" 
                                                                data-mobile="{{ $complaint->mobile }}" 
                                                                data-pan="{{ $complaint->pan }}" 
                                                                data-gst="{{ $complaint->gst_no }}" 
                                                                data-aadhar="{{ $complaint->aadhar_no }}" 
                                                                data-city="{{ $complaint->city }}" 
                                                                data-state="{{ $complaint->state }}" 
                                                                data-description="{{ $complaint->description }}" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#editCategoryModal">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $complaint->id }}" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">
                                                        <i class="fas fa-trash-alt"></i>
                                                        </button>


                                                        <!-- <button class="btn btn-sm btn-primary edit-btn"><i class="fas fa-edit"></i></button> -->
                                                        <!-- <button class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash-alt"></i></button> -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
        
                   
                    </div> <!-- container-fluid -->
                </div>

                <!-- Edit Complaint Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  id="updateCategoryForm" >
                    <input type="hidden" id="editCategoryId">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" id="editName" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile No</label>
                        <input type="text" id="editMobile" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PAN</label>
                        <input type="text" id="editPAN" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">GST No</label>
                        <input type="text" id="editGST" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Aadhar No</label>
                        <input type="text" id="editAadhar" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" id="editCity" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Complaint Description</label>
                        <input type="text" id="editComplaint" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">State</label>
                        <input type="text" id="editState" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">From</label>
                        <input type="text" id="editFrom" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success" id="saveChangesBtn">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Category Modal -->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCategoryLabel">Delete Complaint</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this Complaint?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- ✅ JavaScript for Handling Edit & Update -->
<script>
    $(document).ready(function () {
        let deleteId = null;
        // Open Edit Modal and Populate Fields
        $('.editBtn').on('click', function () {
            let id = $(this).data('id'); // Get the ID
            let name = $(this).data('name');
            let mobile = $(this).data('mobile');
            let pan = $(this).data('pan');
            let gst = $(this).data('gst');
            let aadhar = $(this).data('aadhar');
            let city = $(this).data('city');
            let state = $(this).data('state');
            let description = $(this).data('description');

            $('#editCategoryId').val(id);
            $('#editName').val(name);
            $('#editMobile').val(mobile);
            $('#editPAN').val(pan);
            $('#editGST').val(gst);
            $('#editAadhar').val(aadhar);
            $('#editCity').val(city);
            $('#editState').val(state);
            $('#editComplaint').val(description);

            // Open edit modal
            $('#editCategoryModal').modal('show');
        });

        // AJAX Update Request
        $('#updateCategoryForm').on('submit', function (e) {
            e.preventDefault();
            
            let id = $('#editCategoryId').val();
            let name = $('#editName').val();
            let mobile = $('#editMobile').val();
            let pan = $('#editPAN').val();
            let gst = $('#editGST').val();
            let aadhar = $('#editAadhar').val();
            let city = $('#editCity').val();
            let state = $('#editState').val();
            let description = $('#editComplaint').val();

            $.ajax({
                url: `/admin/complaint/update/${id}`,
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    name: name,
                    mobile: mobile,
                    pan: pan,
                    gst_no: gst,
                    aadhar_no: aadhar,
                    city: city,
                    state: state,
                    description: description
                },
                success: function (response) {
                    alert('Complaint updated successfully!');
                    location.reload();
                },
                error: function (error) {
                    alert('Something went wrong. Try again.');
                }
            });
        });
        // Open Delete Modal & Get ID
    $('.deleteBtn').on('click', function () {
        deleteId = $(this).data('id');
    });
        
        // Confirm Delete
    $('#confirmDelete').on('click', function () {
        $.ajax({
            url: `/admin/complaint/delete/${deleteId}`,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                alert('complaint deleted successfully!');
                location.reload();
            },
            error: function (error) {
                alert('Error deleting category.');
            }
        });
    });
    });
</script>
<script>
            document.addEventListener("DOMContentLoaded", function() {
                let table = document.getElementById("datatable").getElementsByTagName("tbody")[0];
                let editRowIndex = null;
            
                // Edit Button Click Event
                table.addEventListener("click", function(event) {
                    if (event.target.closest(".edit-btn")) {
                        let row = event.target.closest("tr");
                        let cells = row.cells;
            
                        // Store row index
                        editRowIndex = row.rowIndex - 1;
            
                        // Fill modal fields with row data
                        document.getElementById("editName").value = cells[1].innerText;
                        document.getElementById("editMobile").value = cells[2].innerText;
                        document.getElementById("editPAN").value = cells[3].innerText;
                        document.getElementById("editGST").value = cells[4].innerText;
                        document.getElementById("editAadhar").value = cells[5].innerText;
                        document.getElementById("editCity").value = cells[6].innerText;
                        document.getElementById("editComplaint").value = cells[7].innerText;
                        document.getElementById("editState").value = cells[8].innerText;
                        document.getElementById("editFrom").value = cells[9].innerText;
            
                        // Open modal
                        let editModal = new bootstrap.Modal(document.getElementById("editModal"));
                        editModal.show();
                    }
                });
            
                // Save Changes Button Click Event
                document.getElementById("saveChangesBtn").addEventListener("click", function() {
                    if (editRowIndex !== null) {
                        let row = table.rows[editRowIndex];
            
                        // Update row data
                        row.cells[1].innerText = document.getElementById("editName").value;
                        row.cells[2].innerText = document.getElementById("editMobile").value;
                        row.cells[3].innerText = document.getElementById("editPAN").value;
                        row.cells[4].innerText = document.getElementById("editGST").value;
                        row.cells[5].innerText = document.getElementById("editAadhar").value;
                        row.cells[6].innerText = document.getElementById("editCity").value;
                        row.cells[7].innerText = document.getElementById("editComplaint").value;
                        row.cells[8].innerText = document.getElementById("editState").value;
                        row.cells[9].innerText = document.getElementById("editFrom").value;
            
                        // Close modal
                        let editModal = bootstrap.Modal.getInstance(document.getElementById("editModal"));
                        editModal.hide();
                    }
                });
            
                // Delete Button Click Event
                table.addEventListener("click", function(event) {
                    if (event.target.closest(".delete-btn")) {
                        event.target.closest("tr").remove();
                    }
                });
            });
            </script>
@endsection