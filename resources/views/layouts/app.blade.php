<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initialscale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Simple Laravel 11 CRUD Application Tutorial</title>
 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.
min.css">
 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
 <div class="container">
 <h3 class=" mt-3">Simple Laravel 11 CRUD Application
Tutorial</h3>
 @yield('content')
 <div class="row justify-content-center text-center mt-3">
 <div class="col-md-12">


 <!-- Example navbar in layouts/app.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">GKCFaithLink</a>

        <div class="d-flex ms-auto">
            @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<p>
Return to Website: <a
href="https://www.usjr.edu.ph/"><strong>University of San Jose -
Recoletos</strong></a>
</p>

 </div>
 </div>
 </div>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bu
ndle.min.js"></script>
</body>
</html>
