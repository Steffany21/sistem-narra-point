<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Narra Farma Poin | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<style>
    .main{
        height: 100vh;
    }

    img {
        height: 45px;
        width: 45px;
        border-radius: 50%;
    }

    .sidebar {
        background: #1B6E43;
        color: white;
    }
    
    .sidebar ul {
        list-style: none;
    }

    .sidebar li {
        padding: 12px;
    }

    .sidebar a {
        color: white;
        text-decoration: none;
    }
    
    .sidebar li i {
        margin-right: 8px;
    }

    .sidebar li:hover {
        background: #19804b;
    }

</style>

<body>
    <div class="main d-flex flex-column justify-content-between">
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color:#1B6E43; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/storage/logo.jpg" alt="Logo">
                Narra Point</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" 
          aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>

          <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
                    <ul>
                        <li>
                            <i class="bi bi-grid-fill" aria-hidden="true"></i><a href="dashboard"> Dashboard</a>
                        </li>
                        <li>
                            <i class="bi bi-database-fill"></i><a href="data-master">Data Master</a>
                        </li>
                        <li>
                            <i class="bi bi-wallet-fill"></i></i><a href="transaction">Transaction</a>
                        </li>
                        <li>
                            <i class="bi bi-person-fill"></i><a href="employee">Employee</a>
                        </li>
                        <li>
                            <i class="bi bi-file-earmark-bar-graph-fill"></i><a href="report">Report</a>
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="button" style="background-color: transparent; border: none; color:white;"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                        </li>    
                    </ul>
                </div>

                <div class="content p-4 col-lg-10">
                    @yield('content')
                </div>
            </div>
          </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>