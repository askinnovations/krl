<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // टेबल का नाम

    protected $primaryKey = 'order_id'; // Primary Key को order_id बनाना (अगर id use नहीं कर रहे)

    public $incrementing = false; // क्योंकि order_id auto-increment नहीं होगा

    protected $fillable = [
        'order_id',
        'description',
        'order_date',
        'status',
        'cargo_description_type',

        // Consignor (Sender) Details
        'consignor_name',
        'consignor_loading',
        'consignor_gst',

        // Consignee (Receiver) Details
        'consignee_name',
        'consignee_unloading',
        'consignee_gst',

        // LR (Consignment) Specific Fields
        'lr_number',
        'lr_date',
        'vehicle_date',
        'vehicle_id',
        'vehicle_ownership',
        'delivery_mode',
        'from_location', //origin
        'to_location', //destination
        
       // Document Details
       // Cargo (JSON fields)
      
       'packages_no',
       'package_type',
       'package_description',
        'weight',
       'actual_weight',
       'charged_weight',

       // Document (JSON fields)
       'document_no',
       'document_name',
       'document_date',
       'eway_bill',
       'valid_upto',

        // Freight Details
        'freight_amount',
        'lr_charges',
        'hamali',
        'other_charges',
        'gst_amount',
        'total_freight',
        'less_advance',
        'balance_freight',
        'declared_value'
    ];


    protected $casts = [
        'packages_no'         => 'array',
        'package_type'        => 'array',
        'package_description' => 'array',
        'weight'              => 'array',
        'actual_weight'       => 'array',
        'charged_weight'      => 'array',

        'document_no'         => 'array',
        'document_name'       => 'array',
        'document_date'       => 'array',
        'eway_bill'           => 'array',
        'valid_upto'          => 'array',

       
    ];
    

    // app/Models/Order.php
public function vehicle()
{
    return $this->belongsTo(Vehicle::class, 'vehicle_id');
}


}
