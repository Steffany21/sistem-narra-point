@extends('layouts.mainlayout')

@section('title', 'Transaction')
    
@section('content')
    <h2>Transaction</h2>
    <div class="container text-center" style="background: #1B6E43;">
        <div class="row align-items-center">
          <div class="col" style="height: 550px; padding: 20px">
            <div class="col d-flex justify-content-end">
                <form class="transaction" role="search" style="margin-right: 10px;">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                  <div class="dropdown" style="margin-right: 10px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: white; color:black;">
                    Sort
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Name</a></li>
                      <li><a class="dropdown-item" href="#">Number Phone</a></li>
                    </ul>
                  </div>
            </div>
           
              <div class="container text-center" style="background: white; padding: 0px;">
                <div class="col" style="height: 450px;">
                    <div class="my-2">
                        <table class="table">
                            <thead>
                                <th>Date</th>
                                <th>Phone Number</th>
                                <th>Customer Name</th>
                                <th>Total Purchase</th>
                                <th>Total Exchange</th>
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