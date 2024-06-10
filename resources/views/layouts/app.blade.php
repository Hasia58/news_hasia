<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'News Website')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-pink {
            background-color: #ff69b4;
        }
        .btn-pink {
            background-color: #ff69b4;
            color: white;
        }
        .btn-pink:hover {
            background-color: #ff1493;
            color: white;
        }
    </style>
</head>
<body>
    <div class="bg-pink py-3">
        <h3 class="text-white text-center">News Website</h3>
    </div>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
