@extends('admin.layouts.app')
@section('title', 'Order | KRL')
@section('content')
<form method="POST" action="{{ route('admin.orders.update', $order->order_id) }}">
   @csrf
   <div class="card">
      <div class="card-header">
         <h4>Edit Order</h4>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-3">
               <label>📌 Order ID</label>
               <input type="text" name="order_id" class="form-control" value="{{ $order->order_id }}" readonly>
            </div>
            <div class="col-md-3">
               <label>📝 Description</label>
               <textarea name="description" class="form-control">{{ $order->description }}</textarea>
            </div>
            <div class="col-md-3">
               <label>📅 Date</label>
               <input type="date" name="order_date" class="form-control" value="{{ $order->order_date }}">
            </div>
            <div class="col-md-3">
               <label>📊 Status</label>
               <select name="status" class="form-select">
               <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
               <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
               <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
               <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
               </select>
            </div>
            <!-- CUSTOMER NAME DROPDOWN -->
            <div class="col-md-3">
               <div class="mb-3">
                  <label class="form-label">👤 CUSTOMER NAME</label>
                  <select name="customer_id" id="customer_id" class="form-select" onchange="setCustomerDetails()">
                     <option value="">Select Customer</option>
                     @foreach($users as $user)
                     @php
                     $addresses = json_decode($user->address, true);
                     $formattedAddress = '';
                     if (!empty($addresses) && is_array($addresses)) {
                     $first = $addresses[0]; // only first address
                     $formattedAddress = trim(
                     ($first['full_address'] ?? '') . ', ' .
                     ($first['city'] ?? '') . ', ' .
                     ($first['pincode'] ?? '')
                     );
                     }
                     $isSelected = old('customer_id', isset($order) ? $order->customer_id : '') == $user->id;
                     @endphp
                     <option 
                     value="{{ $user->id }}"
                     data-gst="{{ $user->gst_number }}"
                     data-address="{{ $formattedAddress }}"
                     {{ $isSelected ? 'selected' : '' }}>
                     {{ $user->name }}
                     </option>
                     @endforeach
                  </select>
               </div>
            </div>
            <!-- GST NUMBER (Auto-filled) -->
            <div class="col-md-3">
               <div class="mb-3">
                  <label class="form-label">🧾 GST NUMBER</label>
                  <input type="text" name="gst_number" id="gst_number" value="{{ old('gst_number', isset($order) ? $order->customer_gst : '') }}" class="form-control" readonly>
               </div>
            </div>
            <!-- CUSTOMER ADDRESS (Auto-filled) -->
            <div class="col-md-3">
               <div class="mb-3">
                  <label class="form-label">📍 CUSTOMER ADDRESS</label>
                  <input type="text" name="customer_address" id="customer_address"  value="{{ old('customer_address', isset($order) ? $order->customer_address : '') }}"  class="form-control" readonly>
               </div>
            </div>
            <!-- ORDER TYPE -->
            <div class="col-md-3">
               <div class="mb-3">
                  <label class="form-label">📊 Order Type</label>
                  <select name="order_type" class="form-select">
                     <option value="">Select Order</option>
                     @php
                     $orderType = old('order_type', isset($order) ? $order->order_type : '');
                     @endphp
                     <option value="Back Date" {{ $orderType === 'Back Date' ? 'selected' : '' }}>Back Date</option>
                     <option value="Future" {{ $orderType === 'Future' ? 'selected' : '' }}>Future</option>
                     <option value="Normal" {{ $orderType === 'Normal' ? 'selected' : '' }}>Normal</option>
                  </select>
               </div>
            </div>
         </div>
         <!-- lr  -->
         @php
$lrData = is_array($order->lr) ? $order->lr : json_decode($order->lr, true);
@endphp

         @foreach($lrData as $index => $lr)
         <div class="row mt-4" id="lr-section">
            <h4 style="margin-bottom: 2%;">🚚 Update LR - Consignment Details</h4>
            <div class="row g-3 mb-3 single-lr-row">
               <div class="col-md-3">
                  <label class="form-label">Lr Number</label>
                  <input 
                     type="number" 
                     name="lr_number" 
                     class="form-control" 
                     placeholder="Enter lr number" 
                     value="{{ $lr['lr_number'] ?? '' }}">
               </div>
               <div class="col-md-3">
                  <label class="form-label">Lr Date</label>
                  <input 
                     type="date" 
                     name="lr_date" 
                     class="form-control" 
                     placeholder="Enter lr number" 
                     value="{{ $lr['lr_date'] ?? '' }}">
               </div>
               <!-- Consignor Name -->
              <!-- Consignor Name -->
                  <div class="col-md-3">
                     <label class="form-label">🚚 Consignor Name</label>
                     <select name="consignor_id" id="consignor_id" class="form-select" onchange="setConsignorDetails()">
                        <option value="">Select Consignor Name</option>
                        @foreach($users as $user)
                              @php
                                 $addresses = json_decode($user->address, true);
                                 $formattedAddress = '';
                                 if (!empty($addresses) && is_array($addresses)) {
                                    $first = $addresses[0]; // only first address
                                    $formattedAddress = trim(
                                          ($first['full_address'] ?? '') . ', ' .
                                          ($first['city'] ?? '') . ', ' .
                                          ($first['pincode'] ?? '')
                                    );
                                 }
                                 $isSelected = old('consignor_id', isset($order) ? $order->consignor_id : '') == $user->id;
                              @endphp
                              <option 
                                 value="{{ $user->id }}"
                                 data-gst-consignor="{{ $user->gst_number }}"
                                 data-address-consignor="{{ $formattedAddress }}"
                                 {{ $isSelected ? 'selected' : '' }}>
                                 {{ $user->name }}
                              </option>
                        @endforeach
                     </select>
                  </div>

                  <!-- Consignor GST -->
                  <div class="col-md-3">
                     <label class="form-label">🧾 Consignor GST</label>
                     <input type="text" name="consignor_gst" id="consignor_gst" 
                           value="{{ old('consignor_gst', isset($order) ? $order->consignor_gst : '') }}" 
                           class="form-control" readonly>
                  </div>

                  <!-- Consignor Loading Address -->
                  <div class="col-md-3">
                     <label class="form-label">📍 Loading Address</label>
                     <input type="text" name="consignor_loading" id="consignor_loading" 
                           value="{{ old('consignor_loading', isset($order) ? $order->consignor_loading : '') }}" 
                           class="form-control" readonly>
                  </div>
               <!-- Consignee Name -->
               <div class="col-md-3">
                  <label class="form-label">🏢 Consignee Name</label>
                  <select name="consignee_id" id="consignee_id" class="form-select" onchange="setConsigneeDetails()">
                     <option value="">Select Consignor Name</option>
                     @foreach($users as $user)
                     @php
                     $addresses = json_decode($user->address, true);
                     $formattedAddress = '';
                     if (!empty($addresses) && is_array($addresses)) {
                     $first = $addresses[0]; // only first address
                     $formattedAddress = trim(
                     ($first['full_address'] ?? '') . ', ' .
                     ($first['city'] ?? '') . ', ' .
                     ($first['pincode'] ?? '')
                     );
                     }
                     $isSelected = old('consignee_id', isset($order) ? $order->consignee_id : '') == $user->id;
                     @endphp
                     <option 
                     value="{{ $user->id }}"
                     data-gst-consignee="{{ $user->gst_number }}"
                     data-address-consignee="{{ $formattedAddress }}"
                     {{ $isSelected ? 'selected' : '' }}>
                     {{ $user->name }}
                     </option>
                     @endforeach
                  </select>
               </div>
               <!-- Consignee GST -->
               <div class="col-md-3">
                  <label class="form-label">🧾 Consignee GST</label>
                  <input type="text" name="consignee_gst" id="consignee_gst" value="{{ old('consignee_gst', isset($order) ? $order->consignee_gst : '') }}" class="form-control" readonly>
               </div>
               <!-- Consignee Unloading Address -->
               <div class="col-md-3">
                  <label class="form-label">📍 Unloading Address</label>
                  <input type="text" name="consignee_unloading" id="consignee_unloading" value="{{ old('consignee_unloading', isset($order) ? $order->consignee_unloading : '') }}" class="form-control" readonly>
               </div>
            </div>
            <div class="row">
               <!-- LR Date -->
               <div class="col-md-4">
                  <div class="mb-3">
                     <label class="form-label">📅 Vehicle Date</label>
                     <input type="date" name="lr[${counter}][vehicle_date]" class="form-control" value="{{ $lr['vehicle_date'] ?? '' }}">
                  </div>
               </div>
               <!-- Vehicle Type (Vehicle ID from vehicles table) -->
               <div class="col-md-4">
                  <div class="mb-3">
                     <label class="form-label">🚛 Vehicle Type</label>
                     <select name="vehicle_type" class="form-select">
                        <option value="">Select Vehicle</option>
                        @foreach ($vehicles as $vehicle)
                           @php
                              $value = $vehicle->vehicle_type . '|' . $vehicle->vehicle_no;

                              // Previous input or order values for comparison
                              $oldValue = old('vehicle_type', isset($order) ? $order->vehicle_type . '|' . $order->vehicle_no : '');

                              $selected = $oldValue === $value ? 'selected' : '';
                           @endphp
                           <option value="{{ $value }}" {{ $selected }}>
                              {{ $vehicle->vehicle_type }} - {{ $vehicle->vehicle_no }}
                           </option>
                        @endforeach
                     </select>
                  </div>
               </div>

               <!-- Vehicle Ownership -->
               <div class="col-md-4">
                  <label class="form-label">🛻 Vehicle Ownership</label>
                  <div class="d-flex gap-3">
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="vehicle_ownership" id="ownership_own" value="Own"
                           {{ old('vehicle_ownership', isset($order) ? $order->vehicle_ownership : '') == 'Own' ? 'checked' : '' }}>
                        <label class="form-check-label" for="ownership_own">Own</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="vehicle_ownership" id="ownership_other" value="Other"
                           {{ old('vehicle_ownership', isset($order) ? $order->vehicle_ownership : '') == 'Other' ? 'checked' : '' }}>
                        <label class="form-check-label" for="ownership_other">Other</label>
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
                        <option value="">Select Mode</option>
                        <option value="Road" {{ old('delivery_mode', $order->delivery_mode) == 'Road' ? 'selected' : '' }}>Road</option>
                        <option value="Rail" {{ old('delivery_mode', $order->delivery_mode) == 'Rail' ? 'selected' : '' }}>Rail</option>
                        <option value="Air" {{ old('delivery_mode', $order->delivery_mode) == 'Air' ? 'selected' : '' }}>Air</option>
                     </select>
                  </div>
               </div>
               <!-- From Location -->
               <div class="col-md-4">
                  <div class="mb-3">
                     <label class="form-label">📍 From (Origin)</label>
                     <select name="from_location" class="form-select">
                        <option value="">Select Origin</option>
                        <option value="Mumbai" {{ old('from_location', $order->from_location) == 'Mumbai' ? 'selected' : '' }}>Mumbai</option>
                        <option value="Delhi" {{ old('from_location', $order->from_location) == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                        <option value="Chennai" {{ old('from_location', $order->from_location) == 'Chennai' ? 'selected' : '' }}>Chennai</option>
                     </select>
                  </div>
               </div>
               <!-- To Location -->
               <div class="col-md-4">
                  <div class="mb-3">
                     <label class="form-label">📍 To (Destination)</label>
                     <select name="to_location" class="form-select">
                        <option value="">Select Destination</option>
                        <option value="Kolkata" {{ old('to_location', $order->to_location) == 'Kolkata' ? 'selected' : '' }}>Kolkata</option>
                        <option value="Hyderabad" {{ old('to_location', $order->to_location) == 'Hyderabad' ? 'selected' : '' }}>Hyderabad</option>
                        <option value="Pune" {{ old('to_location', $order->to_location) == 'Pune' ? 'selected' : '' }}>Pune</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row mt-4">
               <div class="col-12">
                  <h5 class="mb-3 pb-3">📦 Cargo Description</h5>
                  <!-- Documentation Selection -->
                  <div class="mb-3 d-flex gap-3">
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="cargo_description_type" id="singleDoc" value="single" checked>
                        <label class="form-check-label" for="singleDoc">Single Document</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="cargo_description_type" id="multipleDoc" value="multiple">
                        <label class="form-check-label" for="multipleDoc">Multiple Documents</label>
                     </div>
                  </div>
                  <!-- Cargo Details Table -->
                  <div class="table-responsive">
                     <table class="table table-bordered align-middle text-center">
                        <thead>
                           <tr>
                              <th>No. of Packages</th>
                              <th>Packaging Type</th>
                              <th>Description</th>
                              <th>Weight (kg)</th>
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
                              @php 
                                 $cargoData = isset($order->packages_no) ? collect($order->packages_no)->map(function($_, $i) use ($order) {
                                    return [
                                       'packages_no' => $order->packages_no[$i] ?? '',
                                       'package_type' => $order->package_type[$i] ?? '',
                                       'package_description' => $order->package_description[$i] ?? '',
                                       'weight' => $order->weight[$i] ?? '',
                                       'actual_weight' => $order->actual_weight[$i] ?? '',
                                       'charged_weight' => $order->charged_weight[$i] ?? '',
                                       'document_no' => $order->document_no[$i] ?? '',
                                       'document_name' => $order->document_name[$i] ?? '',
                                       'document_date' => $order->document_date[$i] ?? '',
                                       'eway_bill' => $order->eway_bill[$i] ?? '',
                                       'valid_upto' => $order->valid_upto[$i] ?? '',
                                    ];
                                 }) : [
                                    [
                                       'packages_no' => '', 'package_type' => '', 'package_description' => '', 'weight' => '', 
                                       'actual_weight' => '', 'charged_weight' => '', 'document_no' => '', 'document_name' => '', 
                                       'document_date' => '', 'eway_bill' => '', 'valid_upto' => ''
                                    ]
                                 ];
                              @endphp

                              @foreach ($cargoData as $index => $cargo)
                              <tr>
                                 <td><input type="number" name="cargo[{{ $index }}][packages_no]" class="form-control" value="{{ $cargo['packages_no'] }}"></td>
                                 <td>
                                    <select name="cargo[{{ $index }}][package_type]" class="form-select">
                                       <option value="Pallets" {{ $cargo['package_type'] == 'Pallets' ? 'selected' : '' }}>Pallets</option>
                                       <option value="Cartons" {{ $cargo['package_type'] == 'Cartons' ? 'selected' : '' }}>Cartons</option>
                                       <option value="Bags" {{ $cargo['package_type'] == 'Bags' ? 'selected' : '' }}>Bags</option>
                                    </select>
                                 </td>
                                 <td><input type="text" name="cargo[{{ $index }}][package_description]" class="form-control" value="{{ $cargo['package_description'] }}"></td>
                                 <td><input type="number" name="cargo[{{ $index }}][weight]" class="form-control" value="{{ $cargo['weight'] }}"></td>
                                 <td><input type="number" name="cargo[{{ $index }}][actual_weight]" class="form-control" value="{{ $cargo['actual_weight'] }}"></td>
                                 <td><input type="number" name="cargo[{{ $index }}][charged_weight]" class="form-control" value="{{ $cargo['charged_weight'] }}"></td>
                                 <td><input type="text" name="cargo[{{ $index }}][document_no]" class="form-control" value="{{ $cargo['document_no'] }}"></td>
                                 <td><input type="text" name="cargo[{{ $index }}][document_name]" class="form-control" value="{{ $cargo['document_name'] }}"></td>
                                 <td><input type="date" name="cargo[{{ $index }}][document_date]" class="form-control" value="{{ $cargo['document_date'] }}"></td>
                                 <td><input type="text" name="cargo[{{ $index }}][eway_bill]" class="form-control" value="{{ $cargo['eway_bill'] }}"></td>
                                 <td><input type="date" name="cargo[{{ $index }}][valid_upto]" class="form-control" value="{{ $cargo['valid_upto'] }}"></td>
                                 <td>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">🗑</button>
                                 </td>
                              </tr>
                              @endforeach
                        </tbody>

                     </table>
                  </div>
                  <!-- Add Row Button -->
                  <div class="text-end mt-2">
                     <button type="button" class="btn btn-sm" style="background: #ca2639; color: white;"
                        onclick="addRow()">
                     <span style="filter: invert(1);">➕</span> Add Row</button>
                  </div>
               </div>
               <!-- Freight Details Section  -->
               <div class="row mt-4">
                  <div class="col-12">
                     <h5 class="pb-3">🚚 Freight Details</h5>
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
                                    value="{{ $order->freight_amount ?? '' }}"
                                    placeholder="Enter Freight Amount"></td>

                                 <td><input name="lr_charges" type="number" class="form-control"
                                    value="{{ $order->lr_charges ?? '' }}"
                                    placeholder="Enter LR Charges"></td>

                                 <td><input name="hamali" type="number" class="form-control"
                                    value="{{ $order->hamali ?? '' }}"
                                    placeholder="Enter Hamali Charges"></td>

                                 <td><input name="other_charges" type="number" class="form-control"
                                    value="{{ $order->other_charges ?? '' }}"
                                    placeholder="Enter Other Charges"></td>

                                 <td><input name="gst_amount" type="number" class="form-control"
                                    value="{{ $order->gst_amount ?? '' }}"
                                    placeholder="Enter GST Amount"></td>

                                 <td><input name="total_freight" type="number" class="form-control"
                                    value="{{ $order->total_freight ?? '' }}"
                                    placeholder="Total Freight"></td>

                                 <td><input name="less_advance" type="number" class="form-control"
                                    value="{{ $order->less_advance ?? '' }}"
                                    placeholder="Less Advance Amount"></td>

                                 <td><input name="balance_freight" type="number" class="form-control"
                                    value="{{ $order->balance_freight ?? '' }}"
                                    placeholder="Balance Freight Amount"></td>

                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- Declared Value -->
               <div class="row mt-3">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label" style="font-weight: bold;">💰 Declared Value (Rs.)</label>
                        <input type="number" name="lr[${counter}][declared_value]" value="{{ old('declared_value', $order->declared_value) }}" class="form-control">
                     </div>
                  </div>
               </div>
               <!-- Remove / Add More LR Buttons -->
               <div class="d-flex justify-content-end gap-2 mt-3">
                  <button type="button" class="btn btn-outline-warning btn-sm removeLRBtn" data-id="lrItem${counter}" onclick="removeLrRow(this)">
                  <i class="fas fa-trash-alt"></i> Remove
                  </button>
                  <button type="button" class="btn btn-sm addMoreLRBtn" data-id="lrItem${counter}" style="background-color: #ca2639; color: #fff;" onclick="addLrRow()">
                  <i class="fas fa-plus-circle"></i> Add More LR - Consignment
                  </button>
               </div>
               <div class="row">
                  <!-- Submit Button -->
                  <div class="row mt-4 mb-4">
                     <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Consignment 
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- lr -->
         @endforeach
      </div>
   </div>
</form>
<script>
   let lrIndex = {{ isset($order->lrs) ? count($order->lrs) : 1 }};
   
   function addLrRow() {
       const container = document.getElementById('lr-section');
       const row = document.createElement('div');
       row.classList.add('row', 'g-3', 'mb-3', 'single-lr-row');
   
       row.innerHTML = `
           <div class="col-md-3">
               <label class="form-label">🚚 Consignor Name</label>
               <input type="text" name="lrs[${lrIndex}][consignor_name]" class="form-control">
           </div>
           <div class="col-md-3">
               <label class="form-label">🧾 Consignor GST</label>
               <input type="text" name="lrs[${lrIndex}][consignor_gst]" class="form-control">
           </div>
           <div class="col-md-3">
               <label class="form-label">📍 Loading Address</label>
               <input type="text" name="lrs[${lrIndex}][consignor_loading]" class="form-control">
           </div>
           <div class="col-md-3">
               <label class="form-label">🏢 Consignee Name</label>
               <input type="text" name="lrs[${lrIndex}][consignee_name]" class="form-control">
           </div>
           <div class="col-md-3">
               <label class="form-label">🧾 Consignee GST</label>
               <input type="text" name="lrs[${lrIndex}][consignee_gst]" class="form-control">
           </div>
           <div class="col-md-3">
               <label class="form-label">📍 Unloading Address</label>
               <input type="text" name="lrs[${lrIndex}][consignee_unloading]" class="form-control">
           </div>
       `;
   
       container.insertBefore(row, container.lastElementChild); // Add before button
       lrIndex++;
   }
   function removeLrRow(button) {
       const row = button.closest('.single-lr-row');
       row.remove();
   }
</script>
<script>
   function setCustomerDetails() {
       const selected = document.getElementById('customer_id');
       const gst = selected.options[selected.selectedIndex].getAttribute('data-gst');
       const address = selected.options[selected.selectedIndex].getAttribute('data-address');
   
       document.getElementById('gst_number').value = gst || '';
       document.getElementById('customer_address').value = address || '';
   }
   
   // Call on page load (for edit mode)
   document.addEventListener('DOMContentLoaded', function () {
       const customerSelect = document.getElementById('customer_id');
       if (customerSelect.value !== '') {
           setCustomerDetails();
       }
   });
</script>
<!-- Script to Set Values -->
<script>
    function setConsignorDetails() {
        const selected = document.getElementById('consignor_id');
        const selectedOption = selected.options[selected.selectedIndex];

        const gst = selectedOption.getAttribute('data-gst-consignor');
        const address = selectedOption.getAttribute('data-address-consignor');

        document.getElementById('consignor_gst').value = gst ?? '';
        document.getElementById('consignor_loading').value = address ?? '';
    }

    // Ensure values are set on page load (especially edit mode)
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('consignor_id');
        if (select && select.value !== '') {
            setConsignorDetails();
        }
    });
</script>
<script>
   function setConsigneeDetails() {
       const selected = document.getElementById('consignee_id');
       const gst = selected.options[selected.selectedIndex].getAttribute('data-gst-consignee');
       const address = selected.options[selected.selectedIndex].getAttribute('data-address-consignee');
   
       document.getElementById('consignee_gst').value = gst || '';
       document.getElementById('consignee_unloading').value = address || '';
   }
   // Call on page load (for edit mode)
   document.addEventListener('DOMContentLoaded', function () {
       const customerSelect = document.getElementById('consignee_id');
       if (customerSelect.value !== '') {
        setConsigneeDetails();
       }
   });
</script>
<!-- JavaScript to Add & Remove LR Consignments -->
<script>
   var vehicles = @json($vehicles);
   
   // Function जो vehicles array से options generate करेगा
   function generateVehicleOptions() {
       let options = '<option value="">Select Vehicle</option>';
       vehicles.forEach(function(vehicle) {
           // यहाँ आप अपनी आवश्यकता के अनुसार vehicle का display नाम बना सकते हैं
           options += `<option value="${vehicle.id}">${vehicle.vehicle_type} - ${vehicle.vehicle_no}</option>`;
       });
       return options;
   }
</script>
@endsection