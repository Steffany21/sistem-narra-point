<?php

namespace App\Http\Controllers;

use App\Models\DataMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataMasterController extends Controller
{
  

    public function index()
    {
        $data = DataMaster::orderBy('phone_number','desc')->paginate(1);
        return view('datamaster')->with('data', $data);
    }

    public function add()
    {
        return view('addmaster');
    }

   public function edit(Request $request)
   {
     return 'hi';
   }
    
    public function store(Request $request)
    {
        Session::flash('customer_name',$request->customer_name);
        Session::flash('phone_number',$request->phone_number);
        Session::flash('address',$request->address);
        Session::flash('gender',$request->gender);
        Session::flash('total_point',$request->total_point);

        $request->validate([
            'customer_name'=>'required',
            'phone_number'=>'required|numeric|unique:data_masters,phone_number',
            'address'=>'required',
            'gender'=>'required',
            'total_point'=>'required'
        ],[
            'customer_name.required'=>'Customer name is required',
            'phone_number.numeric'=>'Phone number in numbers',
            'phone_number.unique'=>'The phone number already exists',
            'address.required'=>'Address is required',
            'gender.required'=>'Gender is required',
            'total_point.required'=>'Total point is required'
        ]);
        $data = [
            'customer_name' => $request->customer_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'gender' => $request->gender,
            'total_point' =>$request->total_point
        ];
        DataMaster::create($data);
        return redirect()->to('data-master')->with('status', 'Data Added Successfully');
    }
   
  
    
    
}