@extends('layouts.mainlayout')

@section('title', 'Data Master')
    
@section('content')
    <h2>Data Master</h2>
    {{-- <div class="container text-center" style="background: #1B6E43;"> --}}
        <div>
            @if (Session::has('status'))
            <div class="pt-3">
            <div class="alert alert-success">
                {{ Session::get('status') }}
            </div>
            </div>
            @endif 
        </div>
        {{-- <div class="row align-items-center">
          <div class="col" style="height: 550px; padding: 20px">
            <div class="col d-flex justify-content-between align-items-center">
                <h5 style="color: white">Data Customer</h5>
            </div> --}}
            <div class="mt-3 d-flex justify-content-end">
            <a href="add-master" class="btn" style="background-color: #FC8D19; color:white;"><i class="bi bi-plus"></i>Add</a>
            </div>
{{--           
              <div class="container text-center" style="background: white; padding: 0px;">
                <div class="col" style="height: 430px;"> --}}
                    <div class="my-3">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Phone Number</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Total Point</th>
                                <th>Action</th>
                            </thead>
                                     <tbody>
                                        <?php $i = $data->firstItem()?>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$item->phone_number}}</td>
                                                <td>{{$item->customer_name}}</td>
                                                <td>{{$item->address}}</td>
                                                <td>{{$item->gender}}</td>
                                                <td>{{$item->total_point}}</td>
                                                <td>
                                                    <a href="/edit-master" class="btn btn-primary">edit</a>
                                                    <a href="#" class="btn btn-danger">delete</a>
                                                </td> 
                                            </tr>
                                            <?php $i++?>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $data->links() }}
                    

                    </div>
                {{-- </div>
            </div>

        </div>
      </div>  
    </div>             
     --}}
@endsection