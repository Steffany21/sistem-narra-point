<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .main {
       background-image: url('/storage/background.png');
       background-position: center center;
       background-repeat: no-repeat;
       background-size: cover;
       height: 100vh;
       width: 100%;
    }

    .login {
        width: 500px;
        border-radius: 12px;
        padding: 30px;
        background-color: white;
    }

    form div {
        margin-bottom: 15px;
    }

    .form-label {
        color: black;
    }

    .form-control {
        border-color: #1B6E43;
        border-width: 2px;
    }

    .h5 {
        color: #1B6E43;
    }
    
</style>

<body>
<div class="main d-flex justify-content-center align-items-center">
    <div class="login">
        <div class="text-center mb-4">
            <img src="/storage/logo.jpg" width="120px" height="120px">
            <h5 class="h5 mb-3 fw-bold">Narra Point</h5>
        </div>

    <form action="session/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" value="{{ Session::get('username') }}" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="mb-3 d-grid">
            <button name="submit" type="submit" class="btn form-control" style="background-color:#1B6E43; color:white;">Login</button>
        </div>
        <div class="text-center">
            <p class="small mb-0">Need an account? <a href="{{ url('register') }}">Sign up</a></p>
        </div>
    </form>
    
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>