@extends('layout.template') 
@section('title', 'Add Employee')
<!-- START FORM -->
@section('content')

<form action='{{ url('employee')}}' method='post'>
    @csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="id_employee" class="col-sm-2 col-form-label">Id Employee</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name='id_employee' value="{{ Session::get('id_employee') }}" id="id_employee" placeholder="Id Employee">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name='name' value="{{ Session::get('name') }}" id="name" placeholder="Name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="number_phone" class="col-sm-2 col-form-label">Number Phone</label>
            <div class="col-sm-8">
               <input type="tel" class="form-control" name='number_phone' value="{{ Session::get('number_phone') }}" id="number_phone" placeholder="Number Phone">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-8">
               <input type="email" class="form-control" name='email' value="{{ Session::get('email') }}" id="email" placeholder="Email">
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-sm-10">
                <button type="submit" class="btn" name="submit" style="background-color: #1B6E43; color:white;">Save</button>
                <a href="{{ url('employee') }}" class="btn btn-outline-success" style="border-color: #1B6E43; border-width: 2px;">Cancel</a>
            </div>
        </div>
    </div>
</form>
   <!-- AKHIR FORM -->  
@endsection