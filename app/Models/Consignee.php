<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consignee extends Model
{
    use HasFactory;

    protected $table = 'consignees';

    protected $fillable = [
        'name',
        'gst_number',
        'address',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'consignee_id');
    }
}
