@extends('layouts.mainlayout')

@section('title', 'Add Data Master')
    
@section('content')
    <h2>Data Master</h2>
    {{-- <div class="container" style="background: #1B6E43;"> --}}
        {{-- <div class="row align-items-center">
          <div class="col" style="height: 550px; padding: 20px">
            <div class="col d-flex justify-content-between align-items-center">
                <h5 style="color: white">Data Customer</h5>
            </div> --}}
           
                {{-- <div class="container" style="background: white; padding: 10px;">
                    <div class="col" style="height: 450px;">
                        <div> --}}
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{$item}}</li> 
                                @endforeach
                                </ul>
                            </div>  
                            @endif

                            <form action="add-master" method="POST">
                                @csrf
                                <div class="col-8" >
                                    <label for="customer-name" class="form-label">Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control" id="customer_name" value="{{ Session::get('customer_name') }}" placeholder="Customer Name" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                <div class="col-8" style="margin-top: 10px">
                                    <label for="phone-number" class="form-label">Phone Number</label>
                                    <input type="tel" name="phone_number" class="form-control" id="phone_number" value="{{ Session::get('phone_number') }}" placeholder="Phone Number" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                <div class="col-8" style="margin-top: 10px">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" value="{{ Session::get('address') }}" placeholder="Address" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                <div class="col-8" style="margin-top: 10px">
                                            <label for="total-point" class="form-label">Total Point</label>
                                            <input type="number" name="total_point" class="form-control" id="total_point" value="{{ Session::get('total_point') }}" placeholder="Total Point" style="border-color: #1B6E43; border-width:2px;">
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label for="gender">Gender</label>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male" {{ isset($datamaster) && $datamaster->gender == 'male' ? 'checked' : '' }}>
                                              <label class="form-check-label" for="flexRadioDefault1">Male</label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female" {{ isset($datamaster) && $datamaster->gender == 'female' ? 'checked' : '' }}>
                                              <label class="form-check-label" for="flexRadioDefault2">Female</label>
                                            </div>
                                          </div>

                                <div class="mt-3" >
                                    <button type="submit" class="btn" style="background-color: #1B6E43; color:white;">Save</button>
                                    <button type="button" onclick="window.location.href = '{{ ('/data-master') }}'" class="btn btn-outline-success" style="border-color: #1B6E43; border-width: 2px;">Cancel</button>
                                </div>
                            </form>
                        {{-- </div>
                    </div>
                </div>

            </div>
        </div>  
    </div>   --}}
    
@endsection