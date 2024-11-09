@extends('layout.template') 
@section('title', 'Dashboard')

<!-- START DATA -->
@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('dashboard') }}" method="get">
            <input class="form-control me-1" type="search" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Enter keyword" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
        </form>
    </div>

    <div class="container">  
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Number Phone</th>
                <th>Customer Name</th>
                <th>Total Point</th>
            </tr>
        </thead>
            
        <tbody>
            <?php $i = $transaction->firstItem() ?>
            @foreach ($transaction as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->date}}</td>
                    <td>{{ $item->number_phone }}</td>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->total_point}}</td>
                </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>

    {{ $transaction->withQueryString()->links() }} 
      
</div>   
@endsection 
    