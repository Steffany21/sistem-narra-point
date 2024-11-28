@extends('layout.template') 
@section('title', 'Membership')
<!-- START DATA -->
@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('membership') }}" method="get">
            <input class="form-control me-1" type="search" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Enter keyword" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
        </form>
    </div>
          
    <table class="table table-striped">
        <thead>
            <tr> <th class="col-md-1">No</th>
                <th class="col-md-3">Customer Name</th>
                <th class="col-md-3">Membership Tier</th>
            </tr>
        </thead>
            
        <tbody>
            @foreach ($customers as $i => $customer)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $customer->customer_name}}</td>
                    <td>{{ $customer->membership_level}}</td>
                    {{-- <td>{{ $customer->point}}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>              
</div>
<!-- AKHIR DATA --> 
@endsection 
    