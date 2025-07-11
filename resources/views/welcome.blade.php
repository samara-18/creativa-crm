<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creativa CRM</title>
    <link href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .welcome-card {
            max-width: 600px;
            margin: 5rem auto;
            padding: 2rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        .welcome-card h1 {
            font-size: 2.5rem;
            color: #007bff;
        }
        .welcome-card p {
            font-size: 1.2rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="welcome-card text-center">
        <h1>Creativa CRM</h1>
        <p>{{ __('messages.intro') }}</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3">
            {{ __('Login') }}
        </a>
    </div>
</body>
</html>
