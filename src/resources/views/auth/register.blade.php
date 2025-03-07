@extends('layouts.app')

@section('title', '会員登録')

@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<main class="register-screen__container">
        <h1 class="register-screen__title">会員登録</h1>
        
        <form method="POST" action="{{ route('register') }}" class="register-screen__form">
            @csrf
            <div class="register-screen__form-group">
                <label for="username" class="register-screen__label">ユーザー名</label>
                <input type="text" id="username" name="username" class="register-screen__input" value="{{ old('username') }}" >
                @error('username')
                    <div class="register-screen__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="register-screen__form-group">
                <label for="email" class="register-screen__label">メールアドレス</label>
                <input type="email" id="email" name="email" class="register-screen__input" value="{{ old('email') }}" >
                @error('email')
                    <div class="register-screen__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="register-screen__form-group">
                <label for="password" class="register-screen__label">パスワード</label>
                <input type="password" id="password" name="password" class="register-screen__input" >
                @error('password')
                    <div class="register-screen__error">{{ $message }}</div>
                @enderror
            </div>
            <div class="register-screen__form-group">
                <label for="password_confirmation" class="register-screen__label">確認用パスワード</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="register-screen__input" >
                @error('password_confirmation')
                    <div class="register-screen__error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="register-screen__button">登録する</button>
        </form>
        <a href="{{ route('login') }}" class="register-screen__login-link">ログインはこちら</a>
    </main>

@endsection
