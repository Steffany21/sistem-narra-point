<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .report-header {
            text-align: center;
        }

        .company-info {
            text-align: left;
            margin-bottom: 20px;
        }

        img {
            border-radius: 100%;
        }

        table.static{
            position: relative;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div class="company-info" style="display: flex; align-items: center;">
        <img src="/storage/logo.jpg" alt="Logo" style="float: left; margin right: 20px; width: 100px;">
        <p>
            <strong>Narra Farma</strong><br>
            Ruko Aku Tahu blok ee no. 10-11, Sungai Panas, Batam Kota, Kepulauan Riau 29444<br>
            Telp: 0851-0505-7766
        </p>
    </div>

    <div class="form-group" style="border-top: 1.5px solid black;">
       <h3 style="text-align: center">Report Data Narra Farma Point</h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No</th>
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