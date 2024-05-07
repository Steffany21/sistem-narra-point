@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h2>Dashboard</h2>
    <div class="container text-center" style="background: #1B6E43;">
      <div class="row align-items-center">
        <div class="col" style="height: 550px; padding: 20px;">

            <div class="container text-center" style="background: white;">
                <div class="row align-items-center">
                    <div class="col" style="height: 500px;">
                      <form action="" role="search" class="mx-auto p-2"> <!-- Tambahkan kelas mx-auto di sini -->
                        <div class="col-5 p-5 container-fluid text-center">
                            <input type="search" class="form-control" placeholder="Phone Number" style="border-color: #1B6E43; border-width: 2px;">
                        </div>

                        <!-- Button trigger modal -->
                        <div class="col-3 p-3 g-row-5 container-fluid text-center">
                          <button type="button" class="btn form-control" style="background-color: #1B6E43; color:white;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                          Search
                          </button>

                          <!-- pop up utk ada no hp -->
                          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Member Point</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="color: #1B6E43">
                                  Phone Number : 08123123123 <br>
                                  Customer Name : Bela <br>
                                  Total Point : 2.000
                                  <div class="d-flex justify-content-center" style="margin-top: 10px;">
                                    <span style="margin-right: 10px;">Total:</span>
                                    <input type="number" class="form-control" placeholder="Purchase / Point" style="border-color: #1B6E43; border-width: 2px; width: 165px;">
                                  </div>
                                </div>
                                  {{-- <div class="modal-body " style="color: #1B6E43">
                                  Phone Number : 08123123123 <br>
                                  Customer Name : Bela <br>
                                  Total Point : 2.000 <br>
                                  <input type="number" class="form-control" placeholder="Purchase / Point" style="border-color: #1B6E43; border-width: 2px; width: 165px">
                                  </div> --}}
                                    <div class="modal-footer">
                                      <button type="submit" class="btn" style="background-color: #1B6E43; color:white;">Input</button>
                                      
                                      <button type="submit" class="btn btn-outline-success" style="border-color: #1B6E43; border-width: 2px;">Exchange</button>
                                    </div>
                                </div>
                              </div>
                          </div>

                          <!-- pop up utk tdk ada no hp -->
                          {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Member Point</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                  <div class="modal-body" style="color: #1B6E43">
                                  <b>Upps!</b><br>
                                  Phone number is not available. Please add the number phone.
                                  </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn" style="background-color: #1B6E43; color:white;" data-bs-dismiss="modal">
                                      <a href="#" style="color: white; text-decoration: none">Add</a></button>
                                    </div>
                                </div>
                              </div>
                          </div> --}}

                        </div>
                      </form>
                    </div>
                </div>
            </div>

        </div>
      </div>  
    </div>
@endsection