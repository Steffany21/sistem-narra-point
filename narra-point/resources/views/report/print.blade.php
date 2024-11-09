<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        table.static{
            position: relative;
            border: 1px solid black;
        }
    </style>
    <title>PRINT NARA POINT REPORT</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Nara Point Report</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>no</th>
                <th>Date</th>
                <th>Number Phone</th>
                <th>Customer Name</th>
                <th>Total Point</th>
            </tr>

            @foreach ($transaction as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->date}}</td>
                <td>{{ $item->number_phone }}</td>
                <td>{{ $item->customer_name }}</td>
                <td>{{ $item->total_point}}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
    
</body>
</html>