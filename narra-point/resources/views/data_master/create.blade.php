@extends('layout.template') 
@section('title', 'Add Data Master')
<!-- START FORM -->
@section('content')

<form action='{{ url('data_master')}}' method='post'>
    @csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="number_phone" class="col-sm-2 col-form-label">Number Phone</label>
            <div class="col-sm-8">
               <input type="tel" class="form-control" name='number_phone' value="{{ Session::get('number_phone') }}" id="number_phone" placeholder="Number Phone">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="customer_name" class="col-sm-2 col-form-label">Customer Nama</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name='customer_name' value="{{ Session::get('customer_name') }}" id="customer_name" placeholder="Customer Name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name='address' value="{{ Session::get('address') }}" id="address" placeholder="Address">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name='gender' value="{{ Session::get('gender') }}" id="gender" placeholder="Gender">
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-10">
                <button type="submit" class="btn" name="submit" style="background-color: #1B6E43; color:white;">Save</button>
                <a href="{{ url('data_master') }}" class="btn btn-outline-success" style="border-color: #1B6E43; border-width: 2px;">Cancel</a>
            </div>
        </div>
    </div>
</form>
   <!-- AKHIR FORM -->  
@endsection