<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Order;
use App\Models\Vehicle;
use App\Models\User;


class OrderController extends Controller
{
    public function  index(){

    $orders = Order::latest()->get();

    return view('admin.orders.index', compact('orders'));
    }
    
    public function create()
   {
    // Vehicles table से सभी records fetch करें
    $vehicles = Vehicle::all();
    $users = User::all(); // Or apply role/customer filter if needed
    return view('admin.orders.create', compact('vehicles','users'));
    }
      
   
    

// store

public function store(Request $request)
{   

    // dd($request->all());

    $request->validate([
        'description' => 'required|string',
        'order_date'  => 'required|date',
        'customer_id'    => 'required|exists:users,id',
        'consignor_id' => 'required|exists:users,id',
        'consignee_id' => 'required|exists:users,id',
        'status'      => 'required|in:Pending,Processing,Completed,Cancelled',
        'order_type'  => 'required|in:Back Date,Future,Normal,',
    ]);

    $lrDetails = $request->input('lr', []);        // LR Info
    $cargoList = $request->input('cargo', []);     // Cargo Rows
    $cargoType = $request->input('cargo_description_type', 'single');

    if ($cargoType === 'single') {
        foreach ($lrDetails as $lr) {
            $generatedOrderId = 'ORD' . strtoupper(Str::random(6));

            $data = [
                'order_id'    => $generatedOrderId,
                'description' => $request->input('description'),
                'order_date'  => $request->input('order_date'),
                'status'      => $request->input('status'),
                'cargo_description_type' => $cargoType,

                // New: Customer Info
                'customer_id'       => $request->input('customer_id'),
                'customer_gst'      => $request->input('gst_number'),
                'customer_address'  => $request->input('customer_address'),
                'order_type'        => $request->input('order_type'),

                // Consignor Info

                'consignor_id'       => $request->input('consignor_id'),
                'customer_gst'      => $request->input('consignor_gst'),
                'customer_address'  => $request->input('consignor_loading'),
               

                // Consignee Info
                'consignee_id'         => $request->input('consignee_id'),
                
                'consignee_gst'        => $request->input('consignee_gst'),
                'consignee_unloading'  => $request->input('consignee_unloading'),


                // Vehicle & Freight
                
                'lr_number'         => $lr['lr_number'] ?? null,
                'lr_date'           => $lr['lr_date'] ?? null,
                'vehicle_date'      => $lr['vehicle_date'] ?? null,
                'vehicle_id'        => $lr['vehicle_id'] ?? null,
                'vehicle_ownership' => $lr['vehicle_ownership'] ?? null,
                'delivery_mode'     => $lr['delivery_mode'] ?? null,
                'from_location'     => $lr['from_location'] ?? null,
                'to_location'       => $lr['to_location'] ?? null,

                'freight_amount'   => $lr['freight_amount'] ?? null,
                'lr_charges'       => $lr['lr_charges'] ?? null,
                'hamali'           => $lr['hamali'] ?? null,
                'other_charges'    => $lr['other_charges'] ?? null,
                'gst_amount'       => $lr['gst_amount'] ?? null,
                'total_freight'    => $lr['total_freight'] ?? null,
                'less_advance'     => $lr['less_advance'] ?? null,
                'balance_freight'  => $lr['balance_freight'] ?? null,
                'declared_value'   => $lr['declared_value'] ?? null,

                // Cargo arrays
                'packages_no'         => array_column($cargoList, 'packages_no'),
                'package_type'        => array_column($cargoList, 'package_type'),
                'package_description' => array_column($cargoList, 'package_description'),
                'weight'              => array_column($cargoList, 'weight'),
                'actual_weight'       => array_column($cargoList, 'actual_weight'),
                'charged_weight'      => array_column($cargoList, 'charged_weight'),
                'document_no'         => array_column($cargoList, 'document_no'),
                'document_name'       => array_column($cargoList, 'document_name'),
                'document_date'       => array_column($cargoList, 'document_date'),
                'eway_bill'           => array_column($cargoList, 'eway_bill'),
                'valid_upto'          => array_column($cargoList, 'valid_upto'),
            ];

            Order::create($data);
        }
    } else {
        // Multiple documents: 1 LR with multiple orders for each cargo row
        foreach ($lrDetails as $lr) {
            foreach ($cargoList as $cargo) {
                $generatedOrderId = 'ORD' . strtoupper(Str::random(6));

                $data = [
                    'order_id'    => $generatedOrderId,
                    'description' => $request->input('description'),
                    'order_date'  => $request->input('order_date'),
                    'status'      => $request->input('status'),
                    'cargo_description_type' => $cargoType,

                   // New: Customer Info
                   'customer_id'       => $request->input('customer_id'),
                   'customer_gst'      => $request->input('gst_number'),
                   'customer_address'  => $request->input('customer_address'),
                   'order_type'        => $request->input('order_type'),

                   // Consignor Info

                    'consignor_id'       => $request->input('consignor_id'),
                    'customer_gst'      => $request->input('consignor_gst'),
                    'customer_address'  => $request->input('consignor_loading'),
               

                    // Consignee Info
                    'consignee_id'         => $request->input('consignee_id'),
                    
                    'consignee_gst'        => $request->input('consignee_gst'),
                    'consignee_unloading'  => $request->input('consignee_unloading'),

                    // Vehicle & Freight
                    'lr_number'         => $lr['lr_number'] ?? null,
                    'lr_date'           => $lr['lr_date'] ?? null,
                    'vehicle_date'      => $lr['vehicle_date'] ?? null,
                    'vehicle_id'        => $lr['vehicle_id'] ?? null,
                    'vehicle_ownership' => $lr['vehicle_ownership'] ?? null,
                    'delivery_mode'     => $lr['delivery_mode'] ?? null,
                    'from_location'     => $lr['from_location'] ?? null,
                    'to_location'       => $lr['to_location'] ?? null,

                    'freight_amount'   => $lr['freight_amount'] ?? null,
                    'lr_charges'       => $lr['lr_charges'] ?? null,
                    'hamali'           => $lr['hamali'] ?? null,
                    'other_charges'    => $lr['other_charges'] ?? null,
                    'gst_amount'       => $lr['gst_amount'] ?? null,
                    'total_freight'    => $lr['total_freight'] ?? null,
                    'less_advance'     => $lr['less_advance'] ?? null,
                    'balance_freight'  => $lr['balance_freight'] ?? null,
                    'declared_value'   => $lr['declared_value'] ?? null,

                    // Single cargo row as array
                    'packages_no'         => [$cargo['packages_no']],
                    'package_type'        => [$cargo['package_type']],
                    'package_description' => [$cargo['package_description']],
                    'weight'              => [$cargo['weight']],
                    'actual_weight'       => [$cargo['actual_weight']],
                    'charged_weight'      => [$cargo['charged_weight']],
                    'document_no'         => [$cargo['document_no']],
                    'document_name'       => [$cargo['document_name']],
                    'document_date'       => [$cargo['document_date']],
                    'eway_bill'           => [$cargo['eway_bill']],
                    'valid_upto'          => [$cargo['valid_upto']],
                ];

                Order::create($data);
            }
        }
    }

    return redirect()->route('admin.orders.index')->with('success', 'Order(s) saved successfully.');
}



// update

public function update(Request $request, $orderId)
{
    $request->validate([
        'description' => 'nullable|string',
        'order_date' => 'required|date',
        'status' => 'required|string|in:Pending,Processing,Completed,Cancelled',
    ]);

    $order = Order::where('order_id', $orderId)->firstOrFail();

    $order->description = $request->description;
    $order->order_date = $request->order_date;
    $order->status = $request->status;
   
    $order->save();

    return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
}


public function show($order_id)
{
    
    $order = Order::where('order_id', $order_id)->firstOrFail();
    $vehicles = Vehicle::all();
    return view('admin.orders.view', compact('order','vehicles'));
}

// edit
public function edit($order_id)
{
    
    $order = Order::findOrFail($order_id);
    $lrEntries = Order::where('order_id', $order->order_id)
                      ->where('order_date', '!=', $order->order_date) 
                      ->get();
    $users = User::all(); 

    return view('admin.orders.edit', compact('order', 'lrEntries','users'));
}


public function destroy($order_id)
{
    // Get all orders with the same order_id
    $orders = Order::where('order_id', $order_id)->get();

    if ($orders->isEmpty()) {
        return response()->json(['status' => 'error', 'message' => 'No entries found for this order_id.'], 404);
    }

    try {
        // Delete all related LRs
        foreach ($orders as $order) {
            $order->delete();
        }

        return response()->json(['status' => 'success', 'message' => 'All entries under this Order ID deleted successfully.']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Error while deleting entries.'], 500);
    }
}




}
