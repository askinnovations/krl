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
    
    public function edit($id)
    {
        
        
        return view('admin.consignments.edit');
    }
    
    public function store(Request $request)
   {
    // ✅ Step 1: Validation
    $validated = $request->validate([
        'consignor_name' => 'required|string|max:255',
        'consignor_loading' => 'nullable|string|max:255',
        'consignor_gst' => 'nullable|string|max:20',

        'consignee_name' => 'required|string|max:255',
        'consignee_unloading' => 'nullable|string|max:255',
        'consignee_gst' => 'nullable|string|max:20',

        'vehicle_date'         => 'required|date',
        'vehicle_type'         => 'required|string|max:100',
        'vehicle_ownership'    => 'required|in:Own,Other',

        'delivery_mode'        => 'required|string|in:Road,Rail,Air',
        'from_location'        => 'required|string|max:100',
        'to_location'          => 'required|string|max:100',

        // Cargo Description
        'packages_no'          => 'nullable|numeric',
        'package_type'         => 'nullable|string|max:100',
        'package_description'  => 'nullable|string|max:255',
        'actual_weight'        => 'nullable|numeric',
        'charged_weight'       => 'nullable|numeric',
        'document_no'          => 'nullable|string|max:100',
        'document_name'        => 'nullable|string|max:100',
        'document_date'        => 'nullable|date',
        'eway_bill'            => 'nullable|string|max:100',
        'valid_upto'           => 'nullable|date',

        // Freight Details
        'freight_amount'       => 'nullable|numeric',
        'lr_charges'           => 'nullable|numeric',
        'hamali'               => 'nullable|numeric',
        'other_charges'        => 'nullable|numeric',
        'gst_amount'           => 'nullable|numeric',
        'total_freight'        => 'nullable|numeric',
        'less_advance'         => 'nullable|numeric',
        'balance_freight'      => 'nullable|numeric',

        // Declared Value
        'declared_value'       => 'nullable|numeric',

    ]);

    // ✅ Step 2: Generate Unique Order ID
    $order_id = strtoupper(uniqid('LR_'));

    // ✅ Step 3: Get vehicle_id using vehicle_type
    $vehicle = Vehicle::where('vehicle_type', $request->input('vehicle_type'))->first();

    // ✅ Step 4: Prepare data
    $data = array_merge($validated, [
        'order_id' => $order_id,
        'vehicle_id' => $vehicle ? $vehicle->id : null,
    ]);
    // ✅ Step 4: Insert into DB
    try {
        $order = Order::create($data);

        return redirect()->route('admin.consignments.index')
            ->with('success', 'Consignment created successfully with Order ID: ' . $order_id);
    } catch (\Exception $e) {
        return back()->withErrors(['msg' => 'Error creating order: ' . $e->getMessage()]);
    }
  }


}

