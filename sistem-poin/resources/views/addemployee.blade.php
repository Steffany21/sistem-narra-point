@extends('layouts.mainlayout')

@section('title', 'Add Data Employee')
    
@section('content')
    <h2>Employee</h2>
    <div class="container" style="background: #1B6E43;">
        <div class="row align-items-center">
          <div class="col" style="height: 550px; padding: 20px">
            <div class="col d-flex justify-content-between align-items-center">
                <h5 style="color: white">Employee</h5>
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

                            <form action="data-employee-add" method="POST">
                                @csrf
                                <div class="col-12" style="margin-top: 15px">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                <div class="col-12" style="margin-top: 15px">
                                    <label for="phone-number" class="form-label">Phone Number</label>
                                    <input type="tel" name="phone-number" class="form-control" id="phone-number" placeholder="phone-number" style="border-color: #1B6E43; border-width:2px;">
                                </div>
                                <div class="col-12" style="margin-top: 15px">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="input-poin" class="form-control" id="email" placeholder="Email" style="border-color: #1B6E43; border-width:2px;">
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