@extends('layout.template') 
@section('title', 'Employee')
<!-- START DATA -->
@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('employee') }}" method="get">
            <input class="form-control me-1" type="search" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Enter keyword" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
        </form>
    </div>
                
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('employee/create') }}' class="btn btn-primary">+ Add</a>
    </div>
          
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Id Employee</th>
                <th class="col-md-3">Name</th>
                <th class="col-md-3">Number Phone</th>
                <th class="col-md-2">Email</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
            
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->id_employee}}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->number_phone}}</td>
                    <td>{{ $item->email}}</td>
                    <td>
                        <a href='{{ url('employee/'.$item->id_employee.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        
                        <form onsubmit="return confirm('Are you sure you want to delete the data?')" action="{{ url('employee/'.$item->id_employee) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    
    {{ $data->withQueryString()->links() }}
               
</div>
<!-- AKHIR DATA --> 
@endsection 
    