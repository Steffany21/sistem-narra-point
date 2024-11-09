<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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

    .register {
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

</style>

<body>
<div class="main d-flex justify-content-center align-items-center">
    <div class="register">
        <div class="text-center mb-4">
            <h3 class="h3 mb-3 fw-normal">Create your account</h3>
        </div>

    <form action="session/register" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" value="{{ Session::get('name') }}" name="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" value="{{ Session::get('username') }}" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="mb-3 d-grid">
            <button name="submit" type="submit" class="btn form-control" style="background-color:#1B6E43; color:white;">Sign Up</button>
        </div>
        <div class="text-center">
            <p class="small mb-0">Already have an account! <a href="{{ url('login') }}">Login</a></p>
        </div>
    </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>