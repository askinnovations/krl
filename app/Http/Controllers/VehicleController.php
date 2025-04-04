<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Vehicle;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicles.index', compact('vehicles'));
    }
  
    
    // Show Create Form
    public function create()
    {
        return view('admin.vehicles.create'); // 🚀 Ensure You Have This View
    }
    
    
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'vehicle_type' => 'required|string',
            'vehicle_no' => 'required|string|unique:vehicles,vehicle_no',
            'registered_mobile_number' => 'required|string',
            'gvw' => 'nullable|string',
            'payload' => 'nullable|string',
            'chassis_number' => 'nullable|string',
            'engine_number' => 'nullable|string',
            'number_of_tyres' => 'nullable|integer',
            'rc_document_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rc_valid_from' => 'required|date|date_format:Y-m-d',
            'rc_valid_till' => 'required|date|date_format:Y-m-d',
            'fitness_certificate' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fitness_valid_till' => 'nullable|date|date_format:Y-m-d',
            'insurance_document' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'insurance_valid_from' => 'nullable|date|date_format:Y-m-d',
            'insurance_valid_till' => 'nullable|date|date_format:Y-m-d',
            'authorization_permit' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'auth_permit_valid_from' => 'nullable|date|date_format:Y-m-d',
            'auth_permit_valid_till' => 'nullable|date|date_format:Y-m-d',
            'national_permit' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'national_permit_valid_from' => 'nullable|date|date_format:Y-m-d',
            'national_permit_valid_till' => 'nullable|date|date_format:Y-m-d',
            'tax_document' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tax_valid_from' => 'nullable|date|date_format:Y-m-d',
            'tax_valid_till' => 'nullable|date|date_format:Y-m-d',
        ]);
    
        
        // फ़ाइल पथों को संग्रहीत करने के लिए वेरिएबल्स
    
    $rcDocumentPath = null;
    $fitnessCertificatePath = null;
    $insuranceDocumentPath = null;
    $authorizationPermitPath = null;
    $nationalPermitPath = null;
    $taxDocumentPath = null;

    // प्रत्येक फ़ाइल के लिए अपलोड हैंडलिंग
    
    if ($request->hasFile('rc_document_file')) {
        $rcDocumentPath = $request->file('rc_document_file')->store('vehicals/rc', 'public');
    }
    if ($request->hasFile('fitness_certificate')) {
        $fitnessCertificatePath = $request->file('fitness_certificate')->store('vehicals/fitness', 'public');
    }
    if ($request->hasFile('insurance_document')) {
        $insuranceDocumentPath = $request->file('insurance_document')->store('vehicals/insurance', 'public');
    }
    if ($request->hasFile('authorization_permit')) {
        $authorizationPermitPath = $request->file('authorization_permit')->store('vehicals/auth_permit', 'public');
    }
    if ($request->hasFile('national_permit')) {
        $nationalPermitPath = $request->file('national_permit')->store('vehicals/national_permit', 'public');
    }
    if ($request->hasFile('tax_document')) {
        $taxDocumentPath = $request->file('tax_document')->store('vehicals/tax', 'public');
    }

    
        
        $vehicle = Vehicle::create([
          'vehicle_type' => $validatedData['vehicle_type'],
          'vehicle_no' => $validatedData['vehicle_no'],
          'registered_mobile_number' => $validatedData['registered_mobile_number'],
          'gvw' => $validatedData['gvw'] ?? null,
          'payload' => $validatedData['payload'] ?? null,
          'chassis_number' => $validatedData['chassis_number'] ?? null,
          'engine_number' => $validatedData['engine_number'] ?? null,
          'number_of_tyres' => $validatedData['number_of_tyres'] ?? null,
          'rc_document_file' => $rcDocumentPath,
          'rc_valid_from' => Carbon::parse($validatedData['rc_valid_from']),
          'rc_valid_till' => Carbon::parse($validatedData['rc_valid_till']),
          'fitness_certificate' => $fitnessCertificatePath,
          'insurance_document' => $insuranceDocumentPath,
          'fitness_valid_till' => isset($validatedData['fitness_valid_till']) ? Carbon::parse($validatedData['fitness_valid_till']) : null,
          'insurance_valid_from' => isset($validatedData['insurance_valid_from']) ? Carbon::parse($validatedData['insurance_valid_from']) : null,
          'insurance_valid_till' => isset($validatedData['insurance_valid_till']) ? Carbon::parse($validatedData['insurance_valid_till']) : null,
          'authorization_permit' => $authorizationPermitPath,
          'auth_permit_valid_from' => isset($validatedData['auth_permit_valid_from']) ? Carbon::parse($validatedData['auth_permit_valid_from']) : null,
          'auth_permit_valid_till' => isset($validatedData['auth_permit_valid_till']) ? Carbon::parse($validatedData['auth_permit_valid_till']) : null,
          'national_permit' => $nationalPermitPath,
          'national_permit_valid_from' => isset($validatedData['national_permit_valid_from']) ? Carbon::parse($validatedData['national_permit_valid_from']) : null,
          'national_permit_valid_till' => isset($validatedData['national_permit_valid_till']) ? Carbon::parse($validatedData['national_permit_valid_till']) : null,
          'tax_document' => $taxDocumentPath,
          'tax_valid_from' => isset($validatedData['tax_valid_from']) ? Carbon::parse($validatedData['tax_valid_from']) : null,
          'tax_valid_till' => isset($validatedData['tax_valid_till']) ? Carbon::parse($validatedData['tax_valid_till']) : null,
      ]);
      return redirect()->route('admin.vehicles.index')->with('success', 'वाहन सफलतापूर्वक जोड़ा गया!');
    }
    
    
   public function show($id)
   {
    $vehicle = Vehicle::findOrFail($id);
    return view('admin.vehicles.show', compact('vehicle'));
   }
    
   public function destroy($id)
   {
    $user = Vehicle::findOrFail($id);
    $user->delete();

       return response()->json(['success' => true, 'message' => 'Vehicle deleted successfully!']);
   }

   public function edit($id)
  {
    
    $vehicle = Vehicle::findOrFail($id);

    
    return view('admin.vehicles.edit', compact('vehicle'));
  }



  public function update(Request $request, $id)
  {
      // dd($request->all());

      $request->validate([
          'vehicle_type' => 'required|string|max:255',
          'gvw' => 'nullable|numeric',
          'payload' => 'nullable|numeric',
          'vehicle_no' => 'required|string|max:255',
          'chassis_number' => 'required|string|max:255',
          'engine_number' => 'required|string|max:255',
          'registered_mobile_number' => 'required|string|max:15',
          'number_of_tyres' => 'nullable|integer',
          'rc_valid_from' => 'nullable|date',
          'rc_valid_till' => 'nullable|date',
          'fitness_valid_from' => 'nullable|date',
          'fitness_valid_till' => 'nullable|date',
          'insurance_valid_from' => 'nullable|date',
          'insurance_valid_till' => 'nullable|date',
          'auth_permit_valid_from' => 'nullable|date',
          'auth_permit_valid_till' => 'nullable|date',
          'national_permit_valid_from' => 'nullable|date',
          'national_permit_valid_till' => 'nullable|date',
          'tax_valid_from' => 'nullable|date',
          'tax_valid_till' => 'nullable|date',
      ]);
  
      
      $vehicle = Vehicle::findOrFail($id);
  
      
      $vehicle->update($request->all());
  
      // सफल संदेश के साथ इंडेक्स पेज पर रीडायरेक्ट करें
      return redirect()->route('admin.vehicles.index')->with('success', 'वाहन विवरण सफलतापूर्वक अपडेट किया गया!');
  }
  

 }
