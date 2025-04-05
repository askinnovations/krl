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
   <a href="#" class="btn" id="backToListBtn"
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
               <h4>🚚 Freight Bill Details Add</h4>
               <p class="mb-0">Enter the required details for the freight bill.</p>
            </div>
            <a href="{{ route('admin.freight-bill.index') }}" class="btn" id="backToListBtn"
               style="background-color: #ca2639; color: white; border: none;">
            ⬅ Back to Listing
            </a>
         </div>
         <form method="POST" action="{{ route('admin.freight-bill.store') }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <!-- Consignor -->
                    <div class="col-md-6">
                        <h5>📦 Consignor (Sender)</h5>
                        <div class="mb-3">
                            <label class="form-label">Consignor Name</label>
                            <input type="text" name="consignor_name" class="form-control" placeholder="Enter sender's name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Consignor Loading Address</label>
                            <textarea name="consignor_loading" class="form-control" rows="2" placeholder="Enter loading address"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Consignor GST</label>
                            <input type="text" name="consignor_gst" class="form-control" placeholder="Enter GST number">
                        </div>
                    </div>

                    <!-- Consignee -->
                    <div class="col-md-6">
                        <h5>📦 Consignee (Receiver)</h5>
                        <div class="mb-3">
                            <label class="form-label">Consignee Name</label>
                            <input type="text" name="consignee_name" class="form-control" placeholder="Enter receiver's name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Consignee Unloading Address</label>
                            <textarea name="consignee_unloading" class="form-control" rows="2" placeholder="Enter unloading address"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Consignee GST</label>
                            <input type="text" name="consignee_gst" class="form-control" placeholder="Enter GST number">
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

                <!-- Submit Button -->
                <div class="row mt-4 mb-4">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Freight Bill 
                        </button>
                    </div>
                </div>
            </div>
        </form>

      </div>
     
   </div>
</div>
@endsection