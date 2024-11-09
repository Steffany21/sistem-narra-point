@extends('layout.template')
@section('title', 'Report') 
<!-- START DATA -->
@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">         
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('report/print') }}' target="_blank" class="btn btn-primary">print</a>
    </div>
          
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">Date</th>
                <th class="col-md-3">Number Phone</th>
                <th class="col-md-4">Customer Nama</th>
                <th class="col-md-2">Total Point</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($transaction as $item)
            <tr>
                <td>{{ $loop->iteration + ($transaction->currentPage() -1 ) * $transaction->perPage() }}</td>
                <td>{{ $item->date}}</td>
                <td>{{ $item->number_phone }}</td>
                <td>{{ $item->customer_name }}</td>
                <td>{{ $item->total_point}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $transaction->links() }}
                 
</div>
<!-- AKHIR DATA --> 
@endsection 
    