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
            <div class="row mt-4" id="lr-section">
                <label class="fw-bold mb-2">📦 Lorry Receipt Entries</label>

                @foreach($order->lrs ?? [0 => null] as $index => $lr)
                <div class="row g-3 mb-3 single-lr-row">
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
                     data-gst-consignor="{{ $user->consignor_gst }}"
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
                        <input type="text" name="consignor_gst" id="consignor_gst" value="{{ old('consignor_gst', isset($order) ? $order->consignor_gst : '') }}" class="form-control" readonly>
                    </div>

                    <!-- Consignor Loading Address -->
                    <div class="col-md-3">
                        <label class="form-label">📍 Loading Address</label>
                        <input type="text" name="consignor_loading" id="consignor_loading" value="{{ old('consignor_loading', isset($order) ? $order->consignor_loading : '') }}" class="form-control" readonly>
              
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
                     data-gst-consignee="{{ $user->consignor_gst }}"
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
                    
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm w-100" onclick="removeLrRow(this)">❌</button>
                    </div>
                </div>
                @endforeach

                <!-- Add LR Button -->
                <div class="text-end">
                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addLrRow()">➕ Add LR</button>
                </div>
            </div>
            <!-- lr -->


         <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Update Order</button>
         </div>
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

<script>
   function setConsignorDetails() {
       const selected = document.getElementById('consignor_id');
       const gst = selected.options[selected.selectedIndex].getAttribute('data-gst-consignor');
       const address = selected.options[selected.selectedIndex].getAttribute('data-address-consignor');
   
       document.getElementById('consignor_gst').value = gst || '';
       document.getElementById('consignor_loading').value = address || '';
   }
   // Call on page load (for edit mode)
   document.addEventListener('DOMContentLoaded', function () {
       const customerSelect = document.getElementById('consignor_id');
       if (customerSelect.value !== '') {
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
@endsection