<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consignor extends Model
{
    use HasFactory;

    protected $table = 'consignors';

    protected $fillable = [
        'name',
        'gst_number',
        'address',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'consignor_id');
    }
}
