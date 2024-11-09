@extends('layout.template') 
@section('title', 'Add Transaction')
<!-- START DATA -->
@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="form-area">
        <form action="{{ url('transaction/store')}}" method="POST">
            @csrf
            <div class="mb-3 row">
                <div class="col-sm-8">
                    <label>Date and Time</label>
                    <input type="datetime-local" class="form-control" name="date" id="date">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-8">
                    <label>Number Phone</label>
                    <br>
                    <select name="number_phone" id="number_phone" class="form-control">
                        <option value="0" selected hidden>Select number phone</option>
                        @foreach ($datamaster as $number_phone=>$customer_name)
                        <option value="{{$number_phone}}">{{$number_phone}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- <div class="mb-3 row">
                <div class="col-sm-8">
                    <label>Customer Name</label>
                    <br>
                    <select name="customer_name" id="customer_name" class="form-control">
                        <option value="0" selected hidden>Select customer name</option>
                        @foreach ($datamaster as $number_phone=>$customer_name)
                        <option value="{{$customer_name}}">{{$customer_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}

            <div class="mb-3 row">
                <div class="col-sm-8">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-8">
                    <label>Option</label>
                    <select class="form-control" name="option">
                        <option value="0" selected hidden>Select option</option>
                        <option value="1">Add Point</option>
                        <option value="2">Exchange Point</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-8">
                    <label>Add Purchase/Point</label>
                    <input type="text" class="form-control" name="add" placeholder="Add purchase/point">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-3">
                    <input type="submit" class="btn" value="Input" style="background-color: #1B6E43; color:white;">
                    <a href="{{ url('transaction') }}" class="btn btn-outline-success" style="border-color: #1B6E43; border-width: 2px;">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Script to handle AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Attach 'change' event to the number_phone select field
        $('#number_phone').on('change', function() {
            var number_phone = $(this).val();
            if (number_phone != 0) {
                // AJAX call to get customer name
                $.ajax({
                    url: '{{ url("transaction/get") }}', // URL sesuai route yang Anda buat
                    type: 'GET',
                    data: {number_phone: number_phone}, // Mengirim nomor telepon yang dipilih
                    success: function(response) {
                        // Mengisi kolom customer_name dengan response dari server
                        $('#customer_name').val(response.customer_name);
                    }
                });
            } else {
                // Kosongkan kolom customer_name jika tidak ada nomor telepon yang dipilih
                $('#customer_name').val('');
            }
        });
    });
</script>
@endsection