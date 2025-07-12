<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Swap Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #111;
            color: white;
            font-family: 'Segoe UI', cursive;
        }
        .form-control {
            background-color: #222;
            color: white;
            border: 1px solid #555;
        }
        .btn-custom {
            background-color: transparent;
            border: 2px solid #aaa;
            color: white;
            border-radius: 50px;
            padding: 0.3rem 2rem;
        }
        .btn-custom:hover {
            background-color: #444;
        }
        .nav-link {
            color: white !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-3">
        <span class="navbar-brand">Skill Swap Platform</span>
        <a href="{{ url('/') }}" class="btn btn-outline-light rounded-pill">Home</a>
    </nav>

    <main class="container py-5">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>