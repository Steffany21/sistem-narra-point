<?php

namespace App\Http\Controllers;

use App\Models\dataMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $numberrow = 8;

        if(strlen($keyword)){
            $data = dataMaster::where('number_phone', 'like', "%$keyword%")
            ->orWhere('customer_name', 'like', "%$keyword%")
            ->orWhere('address', 'like', "%$keyword%")
            ->orWhere('gender', 'like', "%$keyword%")
                ->paginate($numberrow);
        } else {
            $data = dataMaster::orderBy('number_phone', 'desc')->paginate($numberrow);
        }
            return view('data_master.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_master.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('number_phone', $request->number_phone);
        Session::flash('customer_name', $request->customer_name);
        Session::flash('address', $request->address);
        Session::flash('gender', $request->gender);
        
        $request->validate([
            'number_phone'=>'required|numeric|min:12|min:12',
            'customer_name'=>'required',
            'address'=>'required',
            'gender'=>'required',
        ],[
            'number_phone.required'=>'number phone is required',
            'number_phone.numeric'=>'number phone must be numeric',
            'customer_name.required'=>'customer name is required',
            'address.required'=>'address is required',
            'gender.required'=>'gender is required',
        ]);

        $data = [
            'number_phone'=>$request->number_phone,
            'customer_name'=>$request->customer_name,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'point'=>0,
            'membership_level'=>'Classic'
        ];

        dataMaster::create($data);
        return redirect()->to('data_master')->with('success', 'Added Data Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = dataMaster::where('number_phone',$id)->first();
        return view('data_master.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'number_phone'=>'required|min:12|min:12',
            'customer_name'=>'required',
            'address'=>'required',
            'gender'=>'required',
        ],[
            'number_phone'=>'number phone is required',
            'customer_name'=>'customer name is required',
            'address'=>'address is required',
            'gender'=>'gender is required',
        ]);

        $data = [
            'number_phone'=>$request->number_phone,
            'customer_name'=>$request->customer_name,
            'address'=>$request->address,
            'gender'=>$request->gender,
        ];
        
        dataMaster::where('number_phone', $id)->update($data);
        return redirect()->to('data_master')->with('success', 'Update Data Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       dataMaster::where('number_phone', $id)->delete();
       return redirect()->to('data_master')->with('success', 'Delete Data Successfully');
    }

    public function membershipTiers(Request $request)
    {
        $keyword = $request->keyword;
        $numberrow = 8;

        if(strlen($keyword)){
            $customers = dataMaster::where('customer_name', 'like', "%$keyword%")
                ->paginate($numberrow);
        } else {
            $customers = dataMaster::orderBy('customer_name', 'desc')->paginate($numberrow);
        }
            return view('membership.level')->with('customers', $customers);

        // $customers = dataMaster::all();
        // return view('membership.level', compact('customers'));
    }
}
