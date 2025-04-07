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

    // dd($request->all());
    $request->validate([
        'description' => 'required|string',
        'order_date'  => 'required|date',
        'status'      => 'required|in:Pending,Processing,Completed,Cancelled',
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

                // Consignor
                'consignor_name'    => $lr['consignor_name'] ?? null,
                'consignor_loading' => $lr['consignor_loading'] ?? null,
                'consignor_gst'     => $lr['consignor_gst'] ?? null,

                // Consignee
                'consignee_name'      => $lr['consignee_name'] ?? null,
                'consignee_unloading' => $lr['consignee_unloading'] ?? null,
                'consignee_gst'       => $lr['consignee_gst'] ?? null,
                'lr_number'           => $lr['lr_number'] ?? null,
                'lr_date'             => $lr['lr_date'] ?? null,

                // Vehicle & Freight
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

                    // Consignor
                    'consignor_name'    => $lr['consignor_name'] ?? null,
                    'consignor_loading' => $lr['consignor_loading'] ?? null,
                    'consignor_gst'     => $lr['consignor_gst'] ?? null,
                    'lr_number'         => $lr['lr_number'] ?? null,
                    'lr_date'           => $lr['lr_date'] ?? null,

                    // Consignee
                    'consignee_name'      => $lr['consignee_name'] ?? null,
                    'consignee_unloading' => $lr['consignee_unloading'] ?? null,
                    'consignee_gst'       => $lr['consignee_gst'] ?? null,

                    // Vehicle & Freight
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

    return redirect()->route('admin.consignments.index')->with('success', 'consignments(s) saved successfully.');
}

}

