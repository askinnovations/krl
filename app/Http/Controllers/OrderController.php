<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Order;
use App\Models\Vehicle;

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
    return view('admin.orders.create', compact('vehicles'));
    }
      

    // edit

    public function edit($id)
    {
        // Fetch the order by order_id
        // $order = Order::where('order_id', $id)->first();
        
        
    
        // Retrieve LR details from the order (assuming the relationship is set up)
        // $lrDetails = $order->lrDetails; // This will fetch the associated LR details
    
        // Return the view with order and lrDetails
        return view('admin.orders.edit');
    }


    // update

    public function update(Request $request, $id)
   {
    // Validate the request
    $request->validate([
        'description' => 'required|string',
        'order_date'  => 'required|date',
        'status'      => 'required|in:Pending,Processing,Completed,Cancelled',
    ]);

    // Fetch the order by order_id
    $order = Order::where('order_id', $id)->first();

    // If the order does not exist, return a 404 error or redirect
    if (!$order) {
        return redirect()->route('admin.orders.index')->with('error', 'Order not found');
    }

    // Retrieve the LR details array from the request
    $lrDetails = $request->input('lr', []);

    // Update main order fields (these are common for all LR items)
    $order->update([
        'description' => $request->input('description'),
        'order_date'  => $request->input('order_date'),
        'status'      => $request->input('status'),
    ]);

    // Loop through each LR detail and update the LR records
    foreach ($lrDetails as $lr) {
        // Find the corresponding LR record for this order
        $lrRecord = $order->lrDetails()->where('id', $lr['id'])->first();

        if ($lrRecord) {
            // Update the LR record
            $lrRecord->update([
                'consignor_name'    => $lr['consignor_name'] ?? null,
                'consignor_loading' => $lr['consignor_loading'] ?? null,
                'consignor_gst'     => $lr['consignor_gst'] ?? null,
                'consignee_name'    => $lr['consignee_name'] ?? null,
                'consignee_unloading'=> $lr['consignee_unloading'] ?? null,
                'consignee_gst'     => $lr['consignee_gst'] ?? null,
                'vehicle_date'      => $lr['vehicle_date'] ?? null,
                'vehicle_id'        => $lr['vehicle_id'] ?? null,
                'vehicle_ownership' => $lr['vehicle_ownership'] ?? null,
                'delivery_mode'     => $lr['delivery_mode'] ?? null,
                'from_location'     => $lr['from_location'] ?? null,
                'to_location'       => $lr['to_location'] ?? null,
                'packages_no'       => $lr['packages_no'] ?? null,
                'package_type'      => $lr['package_type'] ?? null,
                'package_description'=> $lr['package_description'] ?? null,
                'actual_weight'     => $lr['actual_weight'] ?? null,
                'charged_weight'    => $lr['charged_weight'] ?? null,
                'document_no'       => $lr['document_no'] ?? null,
                'document_name'     => $lr['document_name'] ?? null,
                'document_date'     => $lr['document_date'] ?? null,
                'invoice_no'        => $lr['invoice_no'] ?? null,
                'valid_upto'        => $lr['valid_upto'] ?? null,
                'freight_amount'    => $lr['freight_amount'] ?? null,
                'lr_charges'        => $lr['lr_charges'] ?? null,
                'hamali'            => $lr['hamali'] ?? null,
                'other_charges'     => $lr['other_charges'] ?? null,
                'gst_amount'        => $lr['gst_amount'] ?? null,
                'total_freight'     => $lr['total_freight'] ?? null,
                'less_advance'      => $lr['less_advance'] ?? null,
                'balance_freight'   => $lr['balance_freight'] ?? null,
                'declared_value'    => $lr['declared_value'] ?? null,
            ]);
        } else {
            // If LR record doesn't exist, you can create a new one
            $order->lrDetails()->create($lr);
        }
    }

    // Return response with success message
    return redirect()->route('admin.orders.index')
        ->with('success', 'Order updated successfully');
   }

    


    

   


    public function store(Request $request)
    { 

        // dd($request->all());
        // Validate main order fields (optional, customize validation rules as needed)
        $request->validate([
            'description' => 'required|string',
            'order_date'  => 'required|date',
            'status'      => 'required|in:Pending,Processing,Completed,Cancelled',
            
        ]);
        
        // Retrieve the LR details array from the request
        $lrDetails = $request->input('lr', []);

        
        
        // Array to hold created order records
        $createdOrders = [];
        
        // Loop through each LR detail and create an Order record for each
        foreach ($lrDetails as $lr) {
            // Generate unique Order ID for each LR record
            $generatedOrderId = 'ORD' . strtoupper(Str::random(6));

            
            
            // Prepare the data array merging main order fields with current LR fields
            $data = [
                // Main Order Fields (common for all LR items)
                'order_id'    => $generatedOrderId,
                'description' => $request->input('description'),
                'order_date'  => $request->input('order_date'),
                'status'      => $request->input('status'),
                
                // Consignor (Sender) Details from LR
                'consignor_name'    => $lr['consignor_name'] ?? null,
                'consignor_loading' => $lr['consignor_loading'] ?? null,
                'consignor_gst'     => $lr['consignor_gst'] ?? null,
                
                // Consignee (Receiver) Details from LR
                'consignee_name'     => $lr['consignee_name'] ?? null,
                'consignee_unloading'=> $lr['consignee_unloading'] ?? null,
                'consignee_gst'      => $lr['consignee_gst'] ?? null,
                
                // LR (Consignment) Specific Fields from LR
                'vehicle_date'     => $lr['vehicle_date'] ?? null,
                'vehicle_id'       => $lr['vehicle_id'] ?? null,
                'vehicle_ownership'=> $lr['vehicle_ownership'] ?? null,
                'delivery_mode'    => $lr['delivery_mode'] ?? null,
                'from_location'    => $lr['from_location'] ?? null,
                'to_location'      => $lr['to_location'] ?? null,
                
                // Document Details from LR
                'packages_no'         => $lr['packages_no'] ?? null,
                'package_type'        => $lr['package_type'] ?? null,
                'package_description' => $lr['package_description'] ?? null,
                'actual_weight'       => $lr['actual_weight'] ?? null,
                'charged_weight'      => $lr['charged_weight'] ?? null,
                'document_no'         => $lr['document_no'] ?? null,
                'document_name'       => $lr['document_name'] ?? null,
                'document_date'       => $lr['document_date'] ?? null,
                'invoice_no'          => $lr['invoice_no'] ?? null,
                'valid_upto'          => $lr['valid_upto'] ?? null,
                
                // Freight Details from LR
                'freight_amount' => $lr['freight_amount'] ?? null,
                'lr_charges'     => $lr['lr_charges'] ?? null,
                'hamali'         => $lr['hamali'] ?? null,
                'other_charges'  => $lr['other_charges'] ?? null,
                'gst_amount'     => $lr['gst_amount'] ?? null,
                'total_freight'  => $lr['total_freight'] ?? null,
                'less_advance'   => $lr['less_advance'] ?? null,
                'balance_freight'=> $lr['balance_freight'] ?? null,
                'declared_value' => $lr['declared_value'] ?? null,
            ];
            
            // Create Order record for current LR
            $order = Order::create($data);
            $createdOrders[] = $order;
        }
        
        // Return response with all created orders
        return redirect()->route('admin.orders.index')
    ->with('success', 'Orders created successfully');

    }
}
