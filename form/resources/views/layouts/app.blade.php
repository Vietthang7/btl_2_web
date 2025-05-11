<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Thông tin cá nhân')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        .content-container {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            border: none;
            font-weight: bold;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #2a5298, #1e3c72);
            transform: scale(1.05);
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container content-container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>