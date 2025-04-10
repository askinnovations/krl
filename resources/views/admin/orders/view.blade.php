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
      <!-- View Order Details Page -->
      <div class="view-order-form ">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h4>🛒 Order Details View</h4>
                                    <p class="mb-0">View Order details for the order.</p>
                                </div>
                                <a  href="{{ route('admin.orders.index') }}" class="btn" id="backToListBtn"
                                    style="background-color: #ca2639; color: white; border: none;">
                                    ⬅ Back to Listing
</a>
                            </div>
                            <div class="card-body">
                                <p><strong>📌 Order ID:</strong> <span id="viewOrderId">{{ $order->order_id }}</span></p>
                                <p><strong>📝 Consignment Details:</strong> <span id="viewOrderDesc">{{ $order->order_date }}</span></p>
                                <p><strong>📅 Consignment Pickup Date:</strong> <span id="viewOrderDate">{{ $order->description }}</span></p>
                                <p><strong>📊 Status:</strong> <span id="viewOrderStatus">@if($order->status == 'Confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif($order->status == 'Pending')
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                @endif</span></p>
                                <p><strong>📅 Customer Name:</strong> <span id="viewOrderDate">{{ $order->customer->name ?? 'N/A' }}</span></p>
                                <p><strong>📅 Customer Name:</strong> <span id="viewOrderDate">{{ $order->customer->address ?? 'N/A' }}</span></p>
                                <p><strong>📅 Customer Name:</strong> <span id="viewOrderDate">{{ $order->customer->gst_number ?? 'N/A' }}</span></p>

                            </div>
                        </div>
                    </div>
@endsection