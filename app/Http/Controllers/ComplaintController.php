<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    // Display category list
    public function index()
    {
        $complaints = Complaint::all();
        return view('admin.complaint.index', compact('complaints'));
    }

    // Show create category form
    public function create()
    {
        return view('admin.complaint.create');
    }

    // Store category data
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create(['name' => $request->name]);
        return redirect()->route('admin.complaint.index')->with('success', 'complaint added successfully.');
    }

   // Fetch category for edit modal via AJAX
   public function edit($id)
   {
       $complaints = Complaint::findOrFail($id);
       return response()->json($complaints);
   }

   // Update category via AJAX
   public function update(Request $request, $id)
   {
       $request->validate([
           'name' => 'required|string|max:255'
       ]);

       $complaints = Complaint::findOrFail($id);
       $complaints->update([
           'name' => $request->name,
           'mobile' => $request->mobile,
           'pan' => $request->pan,
           'gst_no' => $request->gst_no,
           'aadhar_no' => $request->aadhar_no,
           'address' => $request->address,
           'pincode' => $request->pincode,
           'city' => $request->city,
           'state' => $request->state,
           'description' => $request->description,
       ]);

       return response()->json(['success' => true, 'message' => 'complaint updated successfully!', 'complaints' => $complaints]);
   }

   // Delete category via AJAX
   public function destroy($id)
   {
       $category = Complaint::findOrFail($id);
       $category->delete();

       return response()->json(['success' => true, 'message' => 'complaint deleted successfully!']);
   }

}
