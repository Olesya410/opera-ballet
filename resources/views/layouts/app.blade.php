<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Викторина</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('images/izhevsk-opera_iconka.svg') }}" alt="Логотип" /></a>
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>