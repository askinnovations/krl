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
   
   </div>
   </div>
</div>


@endsection