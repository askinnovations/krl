@extends('admin.layouts.app')
@section('title', 'Order | KRL')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
         <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4 class="mb-sm-0 font-size-18"> LR / Consignment</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                     <li class="breadcrumb-item active"> LR / Consignment</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <!-- Order Booking listing Page -->
      <div class="row listing-form">
         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                     <h4 class="card-title">📦 LR / Consignment</h4>
                     <p class="card-title-desc">View, edit, or delete order details below.</p>
                  </div>
                  <a href="{{ route('admin.consignments.create') }}" class="btn" id="addOrderBtn"
                     style="background-color: #ca2639; color: white; border: none;">
                  <i class="fas fa-plus"></i> Add LR / Consignment
                   </a>
               </div>
               <div class="card-body">
                  <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                     <thead>
                        <tr>
                           <th>S.No</th>
                           <th>Order ID</th>
                           <th>Consignment No</th>
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
                        <tr class="order-row" data-id="{{ $order->id }}">
                            <td>{{ $key + 1 }}</td> <!-- Serial Number -->
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->lr_number}}</td>
                            <td>{{ $order->consignor_name}}</td>
                            <td>{{ $order->consignee_name}}</td>
                            <td>{{ $order->lr_date }}</td>
                            <td>{{ $order->from_location }}</td>
                            <td>{{ $order->to_location }}</td>
                            
                            <td>
                           
                            <a href="{{ route('admin.consignments.view', $order->order_id) }}" class="btn btn-sm btn-light view-btn"><i class="fas fa-eye text-primary"></i>
                            </a>

                            
                            <a href="{{ route('admin.consignments.edit', $order->order_id) }}" class="btn btn-sm btn-light edit-btn">
                                 <i class="fas fa-pen text-warning"></i>
                              </a>


                              <a href="{{ route('admin.consignments.delete', $order->order_id) }}" class="btn btn-sm btn-light delete-btn"><i class="fas fa-trash text-danger"></i></a>
                            </td>


                              
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      
     

   </div>
   <!-- End Page-content -->
</div>
<!-- end main content-->


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                if (!confirm('Are you sure you want to delete all LR entries under this order ID?')) return;

                const url = this.getAttribute('href');

                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (data.status === 'success') {
                        location.reload(); // or redirect
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong.');
                });
            });
        });
    });
</script>


@endsection