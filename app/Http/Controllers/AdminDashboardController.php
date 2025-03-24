<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use App\Models\User; 

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
   {   
    $userCount = User::count(); // Get total users
    $complaintCount = Complaint::count(); // Get total complaints
    return view('admin.dashboard', compact('complaintCount','userCount'));
    }

}
