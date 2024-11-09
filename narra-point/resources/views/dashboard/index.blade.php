<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Point Search</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-3">
        <div class="my-3 p-3 bg-body rounded shadow-sm" style="color:black">
            <form action="{{ url('dashboard') }}" method="GET">
                <input type="tel" name="number_phone" class="form-control" placeholder="Enter phone number">
                <button type="submit" class="btn btn-primary mt-3">Search</button>
            </form>
        </div>
    </div>

    <div class="container">
        @dd($data);
        @if($data)
            <!-- Display modal if data is found -->
            <div class="modal" id="memberModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Member Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Phone Number: {{ $data->number_phone }}</p>
                            <p>Customer Name: {{ $data->customer_name }}</p>
                            <p>Total Point: {{ $data->total_point }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Display modal if no data is found -->
            @if($phoneNumber)
                <div class="modal" id="noDataModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">No Data Found</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>No data found for phone number: {{ $phoneNumber }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script to show the modal based on condition -->
    <script>
        // Use jQuery to show the appropriate modal
        $(document).ready(function() {
            // Show memberModal if $data exists
            @if($data)
                $('#memberModal').modal('show');
            @endif

            // Show noDataModal if $phoneNumber exists but $data does not
            @if(!$data && $phoneNumber)
                $('#noDataModal').modal('show');
            @endif
        });
    </script>
</body>
</html>
