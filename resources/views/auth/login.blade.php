<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .authentication-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 2rem;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .authentication-card-logo {
            margin-bottom: 1.5rem;
        }

        .validation-errors {
            color: #dc3545;
            margin-bottom: 1rem;
        }

        .status-message {
            color: #4caf50;
            margin-bottom: 1rem;
        }

        .authentication-card input[type="email"],
        .authentication-card input[type="password"] {
            width: 100%;
            padding: 1rem;
            margin-top: 0.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
        }

        .authentication-card .remember-me {
            margin-bottom: 1rem;
        }

        .authentication-card button {
            width: 100%;
            padding: 1rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .authentication-card button:hover {
            background-color: #0056b3;
        }

        .authentication-card a {
            color: #007bff;
            text-decoration: none;
        }

        .authentication-card a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="authentication-card mt-5">
        <div class="text-center mb-4">
            <img src="{{asset('AstroKirtika/AstroKirtika.png')}}" alt="logo" class="authentication-card-logo" width="150">
            <h4>Login</h4>
        </div>
        
        <!-- Validation Errors -->
        <div class="validation-errors mb-4">
            {{-- <x-validation-errors class="mb-4" /> --}}

        </div>

        <!-- Status Message -->
        @if (session('email'))
            <div class="alert alert-danger status-message" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ url('admin/login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password">
            </div>

            <div class="form-group form-check">
                <input id="remember_me" class="form-check-input" type="checkbox" name="remember">
                <label class="form-check-label" for="remember_me">Remember me</label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>
        </form>

        <div class="text-right">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            @endif
        </div>
    </div>
</body>

</html>

