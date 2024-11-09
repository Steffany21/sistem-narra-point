@extends('layout.template') 
@section('title', 'Transaction')
<!-- START DATA -->
@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
        <a href="{{ url('transaction/create') }}" class="btn btn-primary">+ Add New Transaction</a>
    </div>

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Date and Time</th>
                    <th class="col-md-3">Number Phone</th>
                    <th class="col-md-4">Customer Nama</th>
                    <th class="col-md-4">Total Point</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($transaction as $key=>$trans)
                <tr>
                    <td>{{ $transaction->firstItem() + $key }}</td>
                    <td>{{ $trans->date }}</td>
                    <td>{{ $trans->number_phone }}</td>
                    <td>{{ $trans->customer_name }}</td>
                    <td>{{ $trans->total_point }}</td>
                </tr>  
                @endforeach
            </tbody>
        </table>

    {{ $transaction->links() }}
    
</div>
<!-- AKHIR DATA --> 
@endsection 

