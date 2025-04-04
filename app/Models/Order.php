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

        // Consignor (Sender) Details
        'consignor_name',
        'consignor_loading',
        'consignor_gst',

        // Consignee (Receiver) Details
        'consignee_name',
        'consignee_unloading',
        'consignee_gst',

        // LR (Consignment) Specific Fields
        'vehicle_date',
        'vehicle_id',
        'vehicle_ownership',
        'delivery_mode',
        'from_location', //origin
        'to_location', //destination
        
       // Document Details
        'packages_no',
        'package_type',
        'package_description',
        'actual_weight',
        'charged_weight',

        'document_no',
        'document_name',
        'document_date',
        'invoice_no',
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

    // app/Models/Order.php
public function vehicle()
{
    return $this->belongsTo(Vehicle::class, 'vehicle_id');
}


}
