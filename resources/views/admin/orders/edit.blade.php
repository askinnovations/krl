@extends('admin.layouts.app')
@section('title', 'Order | KRL')
@section('content')
<form method="POST" action="{{ route('admin.orders.update', $order->order_id) }}">
    @csrf

    <div class="card">
        <div class="card-header"><h4>Edit Order</h4></div>
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
                


                
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Update Order</button>
            </div>
        </div>
    </div>
</form>






@endsection