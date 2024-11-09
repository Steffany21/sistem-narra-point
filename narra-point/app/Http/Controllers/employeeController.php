<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $numberrow = 8;
        
        if(strlen($keyword)){
            $data = employee::where('id_employee', 'like', "%$keyword%")
            ->orWhere('name', 'like', "%$keyword%")
            ->orWhere('number_phone', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%")
                ->paginate($numberrow);
        } else {
            $data = employee::orderBy('id_employee', 'desc')->paginate($numberrow);
        }
            return view('employee.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_employee', $request->id_employee);
        Session::flash('name', $request->name);
        Session::flash('number_phone', $request->number_phone);
        Session::flash('email', $request->email);
        
        $request->validate([
            'id_employee'=>'required|numeric',
            'name'=>'required',
            'number_phone'=>'required|numeric|min:12|min:12',
            'email'=>'required',
        ],[
            'id_employee.required'=>'id employee is required',
            'id_employee.numeric'=>'id employee must be numeric',
            'name.required'=>'customer name is required',
            'number_phone.required'=>'number phone is required',
            'number_phone.numeric'=>'number phone must be numeric',
            'email.required'=>'email is required',
        ]);

        $data = [
            'id_employee'=>$request->id_employee,
            'name'=>$request->name,
            'number_phone'=>$request->number_phone,
            'email'=>$request->email,
        ];

        employee::create($data);
        return redirect()->to('employee')->with('success', 'Added Data Successfully');
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
        $data = employee::where('id_employee',$id)->first();
        return view('employee.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'number_phone'=>'required|numeric|min:12|min:12',
            'email'=>'required',
        ],[
            'name.required'=>'customer name is required',
            'number_phone.required'=>'number phone is required',
            'number_phone.numeric'=>'number phone must be numeric',
            'email.required'=>'email is required',
        ]);

        $data = [
            'name'=>$request->name,
            'number_phone'=>$request->number_phone,
            'email'=>$request->email,
        ];
        
        employee::where('id_employee', $id)->update($data);
        return redirect()->to('employee')->with('success', 'Update Data Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       employee::where('id_employee', $id)->delete();
       return redirect()->to('employee')->with('success', 'Delete Data Successfully');
    }
}
