@extends('layouts.mainlayout')

@section('title', 'Report')
    
@section('content')
    <h2>Report</h2>
    <div class="container text-center" style="background: #1B6E43;">
        <div class="row align-items-center">
          <div class="col" style="height: 550px; padding: 20px">
            <div class="col d-flex justify-content-end align-items-end">
                    <div class="d-flex align-items-start">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="d-flex align-items-start">
                        <label class="form-label me-2" style="color: white;">From</label>
                        <input type="date" name="date" class="form-control me-2" id="date" placeholder="Date" style="border-color: #1B6E43; border-width:2px;">
                    </div>
                    <div class="d-flex align-items-start">
                        <label class="form-label me-2" style="color: white;">To</label>
                        <input type="date" name="date" class="form-control me-2" id="date" placeholder="Date" style="border-color: #1B6E43; border-width:2px;">
                    </div>
                    <div class="d-flex align-items-start">
                        <button type="button" class="btn" style="background-color: white; color:#1B6E43; margin-right: 5px;">Filter</button>
                        <a href="#" class="btn" style="background-color: white; color:#1B6E43;"><i class="bi bi-download"></i>Export</a>
                    </div>
            </div>
           
              <div class="container text-center" style="background: white; padding: 0px;">
                <div class="col" style="height: 450px;">
                    <div class="my-2">
                        <table class="table">
                            <thead>
                                <th>Date</th>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Total Point</th>
                                <th>Exchange Point</th>
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