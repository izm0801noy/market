<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン - CoachTech</title>
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>
<body>
    <div class="login-screen">
        <header class="login-screen__header">
            <img src="{{ asset('images/logo.svg') }}" alt="CoachTech" class="login-screen__logo">
        </header>

        <main class="login-screen__content">
            <h1 class="login-screen__title">ログイン</h1>
            
            <form action="{{ route('login') }}" method="POST" class="login-screen__form">
                @csrf
                
                <div class="login-screen__form-group">
                    <label for="email" class="login-screen__label">メールアドレス</label>
                    <input type="email" id="email" name="email" class="login-screen__input" required>
                </div>

                <div class="login-screen__form-group">
                    <label for="password" class="login-screen__label">パスワード</label>
                    <input type="password" id="password" name="password" class="login-screen__input" required>
                </div>

                <button type="submit" class="login-screen__button">ログインする</button>
            </form>

            <a href="{{ route('register') }}" class="login-screen__register-link">会員登録はこちら</a>
        </main>
    </div>
</body>