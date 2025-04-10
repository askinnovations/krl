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
            <th>LR NO</th>
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
        @php
            $lrDetails = is_array($order->lr) ? $order->lr : json_decode($order->lr, true);
        @endphp
        <tr class="lr-row" data-id="{{ $order->id }}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->order_id }}</td>

            {{-- LR Numbers --}}
            <td>
                @foreach($lrDetails as $lr)
                    {{ $lr['lr_number'] ?? '-' }}<br>
                @endforeach
            </td>

            {{-- Consignors --}}
            <td>
                @foreach($lrDetails as $lr)
                    @php
                        $consignorUser = \App\Models\User::find($lr['consignor_id'] ?? null);
                        $consignorName = $order->consignor->name ?? ($consignorUser->name ?? '-');
                    @endphp
                     {{ $consignorName }}<br>
                @endforeach
            </td>

            {{-- Consignees --}}
            <td>
                @foreach($lrDetails as $lr)
                    @php
                        $consigneeUser = \App\Models\User::find($lr['consignee_id'] ?? null);
                        $consigneeName = $order->consignee->name ?? ($consigneeUser->name ?? '-');
                    @endphp
                     {{ $consigneeName }}<br>
                @endforeach
            </td>

            {{-- LR Dates --}}
            <td>
                @foreach($lrDetails as $lr)
                     {{ $lr['lr_date'] ?? '-' }}<br>
                @endforeach
            </td>

            {{-- From --}}
            <td>
                @foreach($lrDetails as $lr)
                     {{ $lr['from_location'] ?? '-' }}<br>
                @endforeach
            </td>

            {{-- To --}}
            <td>
                @foreach($lrDetails as $lr)
                     {{ $lr['to_location'] ?? '-' }}<br>
                @endforeach
            </td>

            {{-- Action --}}
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

<!-- Add this before any script that uses jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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