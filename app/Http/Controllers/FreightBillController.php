<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FreightBillController extends Controller
{
    public function index(){
        return view('admin.freight_bill.index');
    }
}
