<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FREE-MARKET')</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('CSS')
</head>
<body>
    <header class="header">
        <img src="{{ asset('images/logo.svg') }}" alt="COACHTECH" class="header__logo">
    @yield('search')
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>

