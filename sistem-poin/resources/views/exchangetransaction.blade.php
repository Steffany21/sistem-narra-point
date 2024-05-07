@extends('layouts.mainlayout')

@section('title', 'Exchange Point Transaction')
    
@section('content')
    <h2>Transaction</h2>
    <div class="container" style="background: #1B6E43;">
        <div class="row align-items-center">
          <div class="col" style="height: 550px; padding: 20px">
            <div class="col d-flex justify-content-between align-items-center">
                <h5 style="color: white">Exchange Point</h5>
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

                            <form action="data-master-add" method="POST">
                                @csrf
                                <div class="col-12" style="margin-top: 15px">
                                    <label for="phone-number" class="form-label">Phone Number</label>
                                    <input type="tel" name="phone-number" class="form-control" id="phone-number" placeholder="Phone Number" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                <div class="col-12" style="margin-top: 15px">
                                    <label for="customer-name" class="form-label">Customer Name</label>
                                    <input type="text" name="customer-name" class="form-control" id="customer-name" placeholder="Customer Name" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                <div class="col-12" style="margin-top: 15px">
                                    <label for="total-point" class="form-label">Total Point</label>
                                    <input type="number" name="total-point" class="form-control" id="total-point" placeholder="Total Point" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                <div class="col-12" style="margin-top: 15px">
                                    <label for="input-point" class="form-label">Exchange Point</label>
                                    <input type="number" name="exchange-point" class="form-control" id="exchange-point" placeholder="Exchange Point" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                
                                <div class="mt-3" >
                                    <button type="button" class="btn" style="background-color: #1B6E43; color:white;" data-bs-dismiss="modal">
                                    <a href="#" style="color: white; text-decoration: none">Save</a></button>
                                    <button type="button" class="btn btn-outline-success" style="border-color: #1B6E43; border-width: 2px;">
                                    <a href="#" style="color:#1B6E43; text-decoration: none">Cancel</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>  
    </div>  
    
@endsection