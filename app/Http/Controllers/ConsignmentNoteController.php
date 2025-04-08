<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Vehicle;

class ConsignmentNoteController extends Controller
{
   public function index(){
    $orders = Order::latest()->get();

    return view('admin.consignments.index', compact('orders'));
   }

   public function create()
   {
    // Vehicles table से सभी records fetch करें
    $vehicles = Vehicle::all();
    return view('admin.consignments.create', compact('vehicles'));
    }
    
    
    
    public function store(Request $request)
   {
    // Step 1: Validate main order fields
    $validated = $request->validate([
        'consignor_name' => 'required|string|max:255',
        'consignor_loading' => 'nullable|string|max:255',
        'consignor_gst' => 'nullable|string|max:20',
        'lr_number'     => 'nullable|string|max:100',
        'lr_date'       => 'nullable|date',

        'consignee_name' => 'required|string|max:255',
        'consignee_unloading' => 'nullable|string|max:255',
        'consignee_gst' => 'nullable|string|max:20',

        'vehicle_date' => 'required|date',
        'vehicle_type' => 'required|string|max:100',
        'vehicle_ownership' => 'required|in:Own,Other',

        'delivery_mode' => 'required|string|in:Road,Rail,Air',
        'from_location' => 'required|string|max:100',
        'to_location' => 'required|string|max:100',

        // Freight
        'freight_amount' => 'nullable|numeric',
        'lr_charges' => 'nullable|numeric',
        'hamali' => 'nullable|numeric',
        'other_charges' => 'nullable|numeric',
        'gst_amount' => 'nullable|numeric',
        'total_freight' => 'nullable|numeric',
        'less_advance' => 'nullable|numeric',
        'balance_freight' => 'nullable|numeric',

        // Declared
        'declared_value' => 'nullable|numeric',
    ]);

    // ✅ Step 2: Generate unique order ID
    $order_id = strtoupper(uniqid('ORD_'));

    // ✅ Step 3: Get vehicle ID from vehicle type
    $vehicle = Vehicle::where('vehicle_type', $request->input('vehicle_type'))->first();

    // ✅ Step 4: Prepare cargo arrays
    $cargoList = $request->input('cargo', []);

    $cargo_fields = [
        'packages_no', 'package_type', 'package_description',
        'weight', 'actual_weight', 'charged_weight',
        'document_no', 'document_name', 'document_date',
        'eway_bill', 'valid_upto'
    ];

    $cargoData = [];

    // Initialize arrays
    foreach ($cargo_fields as $field) {
        $cargoData[$field] = [];
    }

    foreach ($cargoList as $cargo) {
        foreach ($cargo_fields as $field) {
            $cargoData[$field][] = $cargo[$field] ?? null;
        }
    }

    // ✅ Step 5: Prepare full data for saving
    $data = array_merge($validated, [
        'order_id'   => $order_id,
        'vehicle_id' => $vehicle ? $vehicle->id : null,
    ], $cargoData); // Add all cargo fields as arrays

    // ✅ Step 6: Store into DB
    try {
        Order::create($data);
        return redirect()->route('admin.consignments.index')
            ->with('success', 'Consignment created successfully with Order ID: ' . $order_id);
    } catch (\Exception $e) {
        return back()->withErrors(['msg' => 'Error saving order: ' . $e->getMessage()]);
    }
  }


//   update
    public function update(Request $request, $orderId)
    {
        // dd($request->all());

    // Step 1: Validate main order fields
    $validated = $request->validate([
        'consignor_name' => 'required|string|max:255',
        'consignor_loading' => 'nullable|string|max:255',
        'consignor_gst' => 'nullable|string|max:20',
        'lr_number' => 'nullable|string|max:100',
        'lr_date' => 'nullable|date',

        'consignee_name' => 'required|string|max:255',
        'consignee_unloading' => 'nullable|string|max:255',
        'consignee_gst' => 'nullable|string|max:20',

        'vehicle_date' => 'required|date',
        'vehicle_type' => 'required|string|max:100',
        'vehicle_ownership' => 'required|in:Own,Other',

        'delivery_mode' => 'required|string|in:Road,Rail,Air',
        'from_location' => 'required|string|max:100',
        'to_location' => 'required|string|max:100',

        // Freight
        'freight_amount' => 'nullable|numeric',
        'lr_charges' => 'nullable|numeric',
        'hamali' => 'nullable|numeric',
        'other_charges' => 'nullable|numeric',
        'gst_amount' => 'nullable|numeric',
        'total_freight' => 'nullable|numeric',
        'less_advance' => 'nullable|numeric',
        'balance_freight' => 'nullable|numeric',

        // Declared
        'declared_value' => 'nullable|numeric',
    ]);
    
    // Lookup by order_id instead of id
    $order = Order::where('order_id', $orderId)->firstOrFail();

    // Step 2: Get vehicle ID from vehicle type
    $vehicle = Vehicle::where('vehicle_type', $request->input('vehicle_type'))->first();

    // Step 3: Handle cargo fields
    $cargoList = $request->input('cargo', []);
  

    $cargo_fields = [
        'packages_no', 'package_type', 'package_description',
        'weight', 'actual_weight', 'charged_weight',
        'document_no', 'document_name', 'document_date',
        'eway_bill', 'valid_upto'
    ];

    $cargoData = [];

    foreach ($cargo_fields as $field) {
        $cargoData[$field] = [];
    }

    foreach ($cargoList as $cargo) {
        foreach ($cargo_fields as $field) {
            $cargoData[$field][] = $cargo[$field] ?? null;
        }
    }

    // Step 4: Merge all data
    $data = array_merge($validated, [
        'vehicle_id' => $vehicle ? $vehicle->id : null,
    ], $cargoData);

    // Step 5: Update the order
    try {
        $order = Order::findOrFail($orderId);
        $order->update($data);

        return redirect()->route('admin.consignments.index')
            ->with('success', 'Consignment updated successfully with Order ID: ' . $order->order_id);
    } catch (\Exception $e) {
        return back()->withErrors(['msg' => 'Error updating order: ' . $e->getMessage()]);
    }
}



   public function show($order_id)
  {
    
    $order = Order::where('order_id', $order_id)->firstOrFail();
    $vehicles = Vehicle::all();
    return view('admin.consignments.view', compact('order','vehicles'));
  }

// edit
    public function edit($order_id)
    {
        // Main Order (primary LR)
        $order = Order::findOrFail($order_id);
        $vehicles = Vehicle::all();

        // All associated LRs with same order_id (excluding the main one if needed)
        $lrEntries = Order::where('order_id', $order->order_id)
                        ->where('order_date', '!=', $order->order_date) // Optional: Exclude main by any field
                        ->get();

        return view('admin.consignments.edit', compact('order', 'lrEntries','vehicles'));
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

