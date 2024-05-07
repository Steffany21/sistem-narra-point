@extends('layouts.mainlayout')

@section('title', 'Employee')
    
@section('content')
    <h2>Employee</h2>
    <div class="container text-center" style="background: #1B6E43;">
        <div class="row align-items-center">
          <div class="col" style="height: 550px; padding: 20px">
            <div class="col d-flex justify-content-between align-items-center">
                <h5 style="color: white">Employee</h5>
                <a href="add-employee" class="btn" style="background-color: #FC8D19; color:white;"><i class="bi bi-plus"></i>Add</a>
            </div>
           
              <div class="container text-center" style="background: white; padding: 0px;">
                <div class="col" style="height: 450px;">
                    <div class="my-2">
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                                    {{-- <tbody>
                                        @foreach ($collection as $item)
                                            
                                        @endforeach
                                    </tbody> --}}
                        </table>

                    </div>
                </div>
            </div>

        </div>
      </div>  
    </div>             
    
@endsection