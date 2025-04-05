@extends('admin.layouts.app')
@section('title', 'Freight-bill | KRL')
@section('content')
<!-- start page title -->
<div class="row">
   <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
         <h4 class="mb-sm-0 font-size-18">Freight Bill</h4>
         <div class="page-title-right">
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
               <li class="breadcrumb-item active">Freight Bill</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<!-- end page title -->
<!-- LR / Consignment Listing Page -->
<div class="row listing-form">
   <div class="col-12">
      <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
            <div>
               <h4 class="card-title">📑 Freight Bill</h4>
               <p class="card-title-desc">View, edit, or delete freight bill details below.</p>
            </div>
            <a  href="{{ route('admin.freight-bill.create') }}" class="btn" 
               style="background-color: #ca2639; color: white; border: none;">
            <i class="fas fa-plus"></i> Add Freight Bill
            </a>
         </div>
         <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Order ID</th>
                                                    
                                                    <th>Consignor</th>
                                                    <th>Consignee</th>
                                                    <th>Date</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        @foreach($orders as $key => $order)
                                            <tr class="lr-row" data-id="1">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $order->order_id }}</td>
                                            
                                                <td>{{ $order->consignor_name }} </td>
                                                <td>{{ $order->consignee_name }}  </td>
                                                <td>{{ $order->document_date }}</td>
                                                <td>{{ $order->from_location }}</td>
                                                <td>{{ $order->to_location }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-light toggle-details"><i
                                                            class="fas fa-eye text-primary"></i></button>
                                                    <button class="btn btn-sm btn-light download-btn"><i
                                                            class="fas fa-download" style="color: green;"></i></button>
                                                            
                                                            <a href="{{ route('admin.freight-bill.edit', $order->id) }}" class="btn btn-sm btn-light edit-btn">
                                                                        <i class="fas fa-pen text-warning"></i>
                                                                     </a>


                                                    <button class="btn btn-sm btn-light delete-btn"><i
                                                            class="fas fa-trash text-danger"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection