@extends('layouts.mainlayout')

@section('title', 'Edit Data Master')
    
@section('content')
    <h2>Data Master</h2>
    <div class="container" style="background: #1B6E43;">
        <div class="row align-items-center">
          <div class="col" style="height: 550px; padding: 20px">
            <div class="col d-flex justify-content-between align-items-center">
                <h5 style="color: white">Data Customer</h5>
            </div>
           
                <div class="container" style="background: white; padding: 10px;">
                    <div class="col" style="height: 450px;">
                        <div class="mt-2 w-50">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li> 
                                @endforeach
                                </ul>
                            </div>  
                            @endif
                            
                           
                            <form action="data-master-edit" method="POST" >
                                @csrf
                                <div class="col-12" style="margin-top: 15px">
                                    <label for="customer-name" class="form-label">Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control" id="customer_name" value ="{{$datamaster}}" placeholder="Customer Name" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                <div class="col-12" style="margin-top: 15px">
                                    <label for="phone-number" class="form-label">Phone Number</label>
                                    <input type="tel" name="phone_number" class="form-control" id="phone_number" value ="{{$datamaster}}" placeholder="Phone Number" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                <div class="col-12" style="margin-top: 15px">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" value ="{{$datamaster}}" placeholder="Address" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                    <div class="form-check form-check-inline" style="margin-top: 15px">
                                        <label for="gender">Gender:</label>
                                        <div>
                                            <input type="radio" name="gender" id="male" value="male" required>
                                            <label for="male">Male</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="gender" id="female" value="female" required>
                                            <label for="female">Female</label>
                                        </div>

                                <div class="mt-3" >
                                    <button type="submit" class="btn" style="background-color: #1B6E43; color:white;">Update</button>
                                    {{-- <button type="submit" class="btn btn-outline-success" style="border-color: #1B6E43; border-width: 2px;">Cancel</a></button> --}}
                                    <button type="button" onclick="window.location.href = '{{ ('/data-master') }}'" class="btn btn-outline-success" style="border-color: #1B6E43; border-width: 2px;">Cancel</button>
                                </div>
                            </form>
                        
                        </div>
                    </div>
                </div>

            </div>
        </div>  
    </div>  
    
@endsection