<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class FreightBillController extends Controller
{
    public function index(){
        $orders = Order::latest()->get();
        return view('admin.freight-bill.index',compact('orders'));
    }
    public function create()
   {
    // Vehicles table से सभी records fetch करें
    $vehicles = Vehicle::all();
    return view('admin.freight-bill.create', compact('vehicles'));
    }


    public function edit($id)
    {
        
        // Return the edit view with the freightBill data
        return view('admin.freight-bill.edit');
    }
    

    

    public function update(Request $request, $id)
    {
        // Validate the input
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
        ]);

        // Find the order by ID and update
        $order = Order::findOrFail($id);
        $order->update($validated);

        // Redirect back to the list page with success
        return redirect()->route('admin.freight-bill.index')->with('success', 'Consignment updated successfully!');
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

        return redirect()->route('admin.freight-bill.index')
            ->with('success', 'Consignment created successfully with Order ID: ' . $order_id);
    } catch (\Exception $e) {
        return back()->withErrors(['msg' => 'Error creating order: ' . $e->getMessage()]);
    }
   }


}