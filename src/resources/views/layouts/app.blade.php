<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - COACHTECH</title>
    <link rel="stylesheet" href="{{ asset('css/auth/layout.css') }}">
    @stack('styles')
</head>
<body>
    <div class="auth-screen">
        <header class="auth-screen__header">
            <img src="{{ asset('images/logo.svg') }}" alt="COACHTECH" class="auth-screen__logo">
        </header>

        <main class="auth-screen__content">
            <h1 class="auth-screen__title">@yield('heading')</h1>
            @yield('content')
        </main>
    </div>
</body>
</html>
