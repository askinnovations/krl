<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'against_user_id', 'name', 'mobile', 'pan', 'gst_no',
        'aadhar_no', 'address', 'pincode', 'city', 'state', 'description'
    ];

 // यूज़र रिलेशन जोड़ें
 public function user()
 {
     return $this->belongsTo(User::class, 'user_id');
 }
 // जिसने कंप्लेंट की है
 public function complainant()
 {
     return $this->belongsTo(User::class, 'user_id');
 }
}
