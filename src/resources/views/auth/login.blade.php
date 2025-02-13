@extends('layouts.app')

@section('title', 'ログイン')

@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
<main class="login-screen__content">
            <h1 class="login-screen__title">ログイン</h1>
            
            <form action="{{ route('login') }}" method="POST" class="login-screen__form">
                @csrf
                <div class="login-screen__form-group">
                    <label for="email" class="login-screen__label">メールアドレス</label>
                    <input type="email" id="email" name="email" class="login-screen__input" value="{{ old('email') }}">
                    @error('email')
                        <div class="login-screen__error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="login-screen__form-group">
                    <label for="password" class="login-screen__label">パスワード</label>
                    <input type="password" id="password" name="password" class="login-screen__input">
                    @error('password')
                        <div class="login-screen__error">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="login-screen__button">ログインする</button>
            </form>
            <a href="{{ route('register') }}" class="login-screen__register-link">会員登録はこちら</a>
        </main>

@endsection
