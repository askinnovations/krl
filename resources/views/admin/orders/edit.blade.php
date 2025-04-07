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
                  <a href="{{ route('admin.orders.create') }}" class="btn" id="backToListBtn"
                     style="background-color: #ca2639; color: white; border: none;">
                  ⬅ Back to Listing
                   </a>
                </div>
               
                <form action="{{ route('admin.orders.update', ['id' => $order->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  
                    <div class="card-body">
                        <div class="row">
                            <!-- Order ID -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">📌 Order ID</label>
                                    <input type="text" name="order_id" class="form-control"
                                        value="{{ old('order_id', $order->order_id) }}">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">📝 Description</label>
                                    <textarea name="description" class="form-control">{{ old('description', $order->description) }}</textarea>
                                </div>
                            </div>

                            <!-- Order Date -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">📅 Date</label>
                                    <input type="date" name="order_date" class="form-control"
                                        value="{{ old('order_date', $order->order_date) }}">
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">📊 Status</label>
                                    <select name="status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Consignor Name -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Consignor Name</label>
                                    <input type="text" name="consignor_name" class="form-control"
                                        value="{{ old('consignor_name', $order->consignor_name) }}">
                                </div>
                            </div>

                            <!-- Consignor Loading -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Consignor Loading</label>
                                    <input type="text" name="consignor_loading" class="form-control"
                                        value="{{ old('consignor_loading', $order->consignor_loading) }}">
                                </div>
                            </div>

                            <!-- Consignor GST -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Consignor GST</label>
                                    <input type="text" name="consignor_gst" class="form-control"
                                        value="{{ old('consignor_gst', $order->consignor_gst) }}">
                                </div>
                            </div>

                            <!-- Consignee Name -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Consignee Name</label>
                                    <input type="text" name="consignee_name" class="form-control"
                                        value="{{ old('consignee_name', $order->consignee_name) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="row mt-4 mb-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Order
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>    

        </div> 
    </div>       
              




@endsection