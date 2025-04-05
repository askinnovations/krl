@extends('admin.layouts.app')
@section('title', 'Order | KRL')
@section('content')
<!-- Order Booking Add Page -->
<div class="row order-booking-form">
         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                     <h4>🛒 Order Details Add</h4>
                     <p class="mb-0">Enter the required details for the order.</p>
                  </div>
                  <a href="{{ route('admin.consignments.create') }}" class="btn" id="backToListBtn"
                     style="background-color: #ca2639; color: white; border: none;">
                  ⬅ Back to Listing
                   </a>
               </div>
                
                   
                    <!-- LR / Consignment add Form -->
                    <div class="row add-form">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4>🚚 Add LR / Consignment</h4>
                                        <p class="mb-0">Fill in the required details for shipment and delivery.</p>
                                    </div>
                                    <a href="{{ route('admin.consignments.create') }}" class="btn" id="backToListBtn"
                                        style="background-color: #ca2639; color: white; border: none;">
                                        ⬅ Back to Listing
                                    </a>
                                </div>
                                <form method="POST" action="{{ route('admin.consignments.store') }}" enctype="multipart/form-data">
                                 @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Consignor Details -->
                                        <div class="col-md-6">
                                            <h5>📦 Consignor (Sender)</h5>
                                            <div class="mb-3">
                                                <label class="form-label">Consignor Name</label>
                                                <input type="text" name="consignor_name"class="form-control"
                                                    placeholder="Enter sender's name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Consignor Loading Address</label>
                                                <textarea name="consignor_loading" class="form-control" rows="2"
                                                    placeholder="Enter all addresses"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Consignor GST</label>
                                                <input type="text" name="consignor_gst" class="form-control" placeholder="Enter GST numbers">
                                            </div>
                                        </div>

                                        <!-- Consignee Details -->
                                        <div class="col-md-6">
                                            <h5>📦 Consignee (Receiver)</h5>
                                            <div class="mb-3">
                                                <label class="form-label">Consignee Name</label>
                                                <input type="text" name="consignee_name" class="form-control"
                                                    placeholder="Enter receiver's name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Consignee Unloading Address</label>
                                                <textarea name="consignee_unloading" class="form-control" rows="2"
                                                    placeholder="Enter all addresses"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Consignee GST</label>
                                                <input name="consignee_gst" type="text" class="form-control" placeholder="Enter GST numbers">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Date -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">📅 Date</label>
                                                <input name="vehicle_date" type="date" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Vehicle Type -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">🚛 Vehicle Type</label>
                                                <select name="vehicle_type" class="form-select">
                                                    <option selected>Select Type</option>
                                                    @foreach ($vehicles as $vehicle)
                                                        <option value="{{ $vehicle->vehicle_type }}">{{ $vehicle->vehicle_type }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <!-- Vehicle Ownership -->
                                        <div class="col-md-4">
                                            <label class="form-label">🛻 Vehicle Ownership</label>
                                            <div class="d-flex gap-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="vehicle_ownership" value="Own" checked>
                                                <label class="form-check-label">Own</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="vehicle_ownership" value="Other">
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
                                                <select name="delivery_mode" class="form-select">
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
                                                <select name="from_location" class="form-select">
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
                                                <select name="to_location" class="form-select">
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
                                                            <td><input type="number" name="packages_no" class="form-control"
                                                                    placeholder="0"></td>
                                                            <td>
                                                            <select name="package_type" class="form-select">
                                                                <option value="Pallets">Pallets</option>
                                                                <option value="Cartons">Cartons</option>
                                                                <option value="Bags">Bags</option>
                                                            </select>

                                                            </td>
                                                            <td><input type="text" name="package_description" class="form-control"
                                                                    placeholder="Enter description"></td>
                                                            <td><input name="actual_weight" type="number" class="form-control"
                                                                    placeholder="0"></td>
                                                            <td><input name="charged_weight" type="number" class="form-control"
                                                                    placeholder="0"></td>
                                                            <td><input name="document_no" type="text" class="form-control"
                                                                    placeholder="Doc No."></td>
                                                            <td><input name="document_name" type="text" class="form-control"
                                                                    placeholder="Doc Name"></td>
                                                            <td><input name="document_date" type="date" class="form-control"></td>
                                                            <td><input name="eway_bill" type="text" class="form-control"
                                                                    placeholder="Eway Bill No."></td>
                                                            <td><input name="valid_upto" type="date" class="form-control"></td>
                                                            <td>
                                                                <button class="btn btn-danger btn-sm"
                                                                    onclick="removeRow(this)">🗑</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                       </div>
                                    </div>

                                    <!-- Freight Details Section -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h5 class=" pb-3">🚚 Freight Details</h5>

                                            

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
                                                            <td><input name="freight_amount" type="number" class="form-control"
                                                                    placeholder="Enter Freight Amount"></td>
                                                            <td><input name="lr_charges" type="number" class="form-control"
                                                                    placeholder="Enter LR Charges"></td>
                                                            <td><input name="hamali" type="number" class="form-control"
                                                                    placeholder="Enter Hamali Charges"></td>
                                                            <td><input name="other_charges" type="number" class="form-control"
                                                                    placeholder="Enter Other Charges"></td>
                                                            <td><input name="gst_amount" type="number" class="form-control"
                                                                    placeholder="Enter GST Amount"></td>
                                                            <td><input name="total_freight" type="number" class="form-control"
                                                                    placeholder="Total Freight"></td>
                                                            <td><input name="less_advance" type="number" class="form-control"
                                                                    placeholder="Less Advance Amount"></td>
                                                            <td><input name="balance_freight" type="number" class="form-control"
                                                                    placeholder="Balance Freight Amount"></td>
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
                                                <input type="number" name="declared_value" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                         <!-- Submit Button -->
                                        <div class="row mt-4 mb-4">
                                            <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Save Consignment & LR Details
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

              
@endsection