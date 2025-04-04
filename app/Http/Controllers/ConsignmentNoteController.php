<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsignmentNoteController extends Controller
{
   public function index(){
    return view('admin.consignment _note.index');
   }
}
