@extends('layouts.mainlayout')

@section('title', 'Data Master')
    
@section('content')
    <h2>Data Master</h2>
    <div class="container text-center" style="background: #1B6E43;">
        <div class="row align-items-center">
          <div class="col" style="height: 550px; padding: 20px">
            <div class="col d-flex justify-content-between align-items-center">
                <h5 style="color: white">Data Customer</h5>
                <a href="add-master" class="btn" style="background-color: #FC8D19; color:white;"><i class="bi bi-plus"></i>Add</a>
            </div>
            
            <div>
                @if (session('status'))
                <div class="alert alert-success alert-sm text-left">
                    {{ session('status') }}
                </div>
                @endif 
            </div>
          
              <div class="container text-center" style="background: white; padding: 0px;">
                <div class="col" style="height: 430px;">
                    <div class="my-2">
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Total Point</th>
                                <th>Action</th>
                            </thead>
                                     <tbody>
                                        @foreach ($datamasters as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->customer_name}}</td>
                                                <td>{{$item->phone_number}}</td>
                                                <td>{{$item->address}}</td>
                                                <td>{{$item->gender}}</td>
                                                <td>{{$item->total_point}}</td>
                                                <td>
                                                    <a href="data-master-edit" class="btn btn-primary">edit</a>
                                                    <a href="#" class="btn btn-danger">delete</a>
                                                </td> 
                                            </tr>
                                        @endforeach
                                    </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
      </div>  
    </div>             
    
@endsection