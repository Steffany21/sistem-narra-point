<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use Illuminate\Http\Request;

class DataMasterController extends Controller
{
  

    public function index()
    {
        $datamasters = DataMaster::all();
        return view('datamaster', ['datamasters'=>$datamasters]);
    }

    public function add()
    {
        return view('addmaster');
    }

    public function store(Request $request)
    {
        $datacustomer = DataMaster::create($request->all());
        return redirect('data-master')->with('status', 'Data Added Successfully');
    }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate ([
//             'customer_name'=>'required|string|max:255',
//             'phone_number'=>'required|string|max:255',
//             'address'=>'required|string',
//             'gender'=>'required|in:male,female',
//             'total_point'=>'integer'
//         ]);

//         $dataMasters = new DataMaster();
//         $dataMasters->customer_name = $validatedData['customer_name'];
//         $dataMasters->phone_number = $validatedData['phone_number'];
//         $dataMasters->address = $validatedData['address'];
//         $dataMasters->gender = $validatedData['gender'];

//         // Check if total_point exists in validated data
// if (array_key_exists('total_point', $validatedData)) {
//     $dataMaster->total_point = $validatedData['total_point'];
// } else {
//     // Set a default value or handle the missing key as needed
//     $dataMaster->total_point = 0; // Example default value
// }
//         // $dataMasters->save();

//         // return redirect('/data-master')->with('success','Data saved successfully');
//        $datamaster=DataMaster::create($request->all());
//        return redirect('data-master')->with('status', 'Data Customer Added Successfully');
//     }

    public function edit($id) 
    {
       $datamaster = DataMaster::find($id);
       return view('datamasteredit', ['datamaster'=>$datamaster]);
    }
}