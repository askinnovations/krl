@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row add form">
                    <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4>🚛 Vehicle Details</h4>
                                        <p>Enter the required details for the vehicle.</p>
                                    </div>
                                    <a  href="{{ route('admin.vehicles.index') }}" class="btn" id="backToListBtn"
                                        style="background-color: #ca2639; color: white; border: none;">
                                        ⬅ Back to Listing
                                    </a>
                                </div>

                                <form action="{{ route('admin.vehicles.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Vehicle Type</label>
                                                <input type="text" class="form-control" name="vehicle_type" placeholder="Enter vehicle type">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">GVW</label>
                                                <input type="text" class="form-control" name="gvw" placeholder="Enter GVW">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Payload</label>
                                                <input type="text" class="form-control" name="payload" placeholder="Enter payload">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Vehicle No</label>
                                                <input type="text" class="form-control" name="vehicle_no" placeholder="Enter vehicle number">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Chassis Number</label>
                                                <input type="text" class="form-control" name="chassis_number" placeholder="Enter chassis number">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Engine Number</label>
                                                <input type="text" class="form-control" name="engine_number" placeholder="Enter engine number">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Registered Mobile Number</label>
                                                <input type="text" class="form-control" name="registered_mobile_number" placeholder="Enter mobile number">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Number of Tyres</label>
                                                <input type="number" class="form-control" name="number_of_tyres" placeholder="Enter number of tyres">
                                            </div>
                                        </div>

                                        <div class="accordion mt-4" id="documentAccordion">
                                            <!-- RC Document -->
                                            <div class="mb-3">
                                                <h5>Documents Upload</h5>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#rcDocument">
                                                        📄 RC Document
                                                    </button>
                                                </h2>
                                                <div id="rcDocument" class="accordion-collapse collapse show">
                                                    <div class="accordion-body row g-3">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Upload Document</label>
                                                            <input type="file" class="form-control" name="rc_document_file">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Valid From</label>
                                                            <input type="date" class="form-control" name="rc_valid_from">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Valid Till</label>
                                                            <input type="date" class="form-control" name="rc_valid_till">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Fitness Document -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fitnessDocument">
                                                        📄 Fitness Certificate
                                                    </button>
                                                </h2>
                                                <div id="fitnessDocument" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Upload Document</label>
                                                                <input type="file" class="form-control" name="fitness_certificate">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Valid Till</label>
                                                                <input type="date" class="form-control" name="fitness_valid_till">
                                                            </div>
                                                            <!-- <div class="col-12 text-end">
                                                            <button type="button" class="btn btn-primary btn-sm" onclick="addMore('fitnessContainer')">➕ Add More</button>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Insurance Document -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#insuranceDocument">
                                                        📄 Insurance
                                                    </button>
                                                </h2>
                                                <div id="insuranceDocument" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Upload Document</label>
                                                                <input type="file" class="form-control" name="insurance_document">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Valid From</label>
                                                                <input type="date" class="form-control" name="insurance_valid_from">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Valid Till</label>
                                                                <input type="date" class="form-control" name="insurance_valid_till">
                                                            </div>
                                                            <!-- <div class="col-12 text-end">
                                                                <button type="button" class="btn btn-primary btn-sm" onclick="addMore('insuranceContainer')">➕ Add More</button>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Authorization Permit -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#authPermit">
                                                        📄 Authorization Permit
                                                    </button>
                                                </h2>
                                                <div id="authPermit" class="accordion-collapse collapse">
                                                    <div class="accordion-body" id="authPermitContainer">
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Upload Document</label>
                                                                <input type="file" name="authorization_permit" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Valid From</label>
                                                                <input type="date" name="auth_permit_valid_from" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Valid Till</label>
                                                                <input type="date" name="auth_permit_valid_till" class="form-control">
                                                            </div>
                                                            <!-- <div class="col-12 text-end">
                                                                <button type="button" class="btn btn-primary btn-sm" onclick="addMore('authPermitContainer')">➕ Add More</button>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- National Permit -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nationalPermit">
                                                        📄 National Permit
                                                    </button>
                                                </h2>
                                                <div id="nationalPermit" class="accordion-collapse collapse">
                                                    <div class="accordion-body" id="nationalPermitContainer">
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Upload Document</label>
                                                                <input type="file" name="national_permit" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Valid From</label>
                                                                <input type="date" name="national_permit_valid_from" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Valid Till</label>
                                                                <input type="date" name="national_permit_valid_till" class="form-control">
                                                            </div>
                                                            <!-- <div class="col-12 text-end">
                                                                <button type="button" class="btn btn-primary btn-sm" onclick="addMore('nationalPermitContainer')">➕ Add More</button>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tax Document -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#taxDocument">
                                                        📄 Tax Document
                                                    </button>
                                                </h2>
                                                <div id="taxDocument" class="accordion-collapse collapse">
                                                    <div class="accordion-body" id="taxContainer">
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Upload Document</label>
                                                                <input type="file" name="tax_document" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Valid From</label>
                                                                <input type="date" name="tax_valid_from" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Valid Till</label>
                                                                <input type="date" name="tax_valid_till" class="form-control">
                                                            </div>
                                                            <!-- <div class="col-12 text-end">
                                                                <button type="button" class="btn btn-primary btn-sm" onclick="addMore('taxContainer')">➕ Add More</button>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12 text-end">
                                                <button type="submit" class="btn btn-primary">Save Vehicle Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>
                    </div>
            </div>  
        </div>
    </div>

<!-- JavaScript for Add/Remove -->
<script>
    function addMore(sectionId) {
        let container = document.getElementById(sectionId);
        let count = container.querySelectorAll(".row").length; // Proper counting of existing elements

        let newEntry = document.createElement("div");
        newEntry.classList.add("row", "g-3", "mt-2");
        newEntry.innerHTML = `
            <div class="col-md-4">
                <label class="form-label">Upload Document</label>
                <input type="file" name="${sectionId}[${count}]" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Valid From</label>
                <input type="date" name="${sectionId}_valid_from[${count}]" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Valid Till</label>
                <input type="date" name="${sectionId}_valid_till[${count}]" class="form-control">
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="button" class="btn btn-danger btn-sm me-2" onclick="removeEntry(this)"> 
                    <i class="fas fa-trash"></i> Remove
                </button>
            </div>
        `;

        container.appendChild(newEntry);
    }

    function removeEntry(button) {
        button.closest(".row").remove();
    }


</script>
@endsection