@extends('layouts.app')

@section('title', 'マイページ')

@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/profiles/index.css') }}">
@endsection

@section('search')
<nav class="header__nav">
    <div class="header__search">
        <input type="text" placeholder="なにをお探しですか？" class="header__search-input">
    </div>

    @if (Auth::check())
        <form action="{{ route('logout') }}" method="POST" class="header__nav-form">
            @csrf
            <button type="submit" class="header__nav-button">ログアウト</button>
        </form>
        <a href="/mypage" class="header__nav-link">マイページ</a>
        <a href="/cart" class="header__nav-link header__nav-link--highlight">出品</a>
    @endif
</nav>
@endsection

@section('content')
<main class="profile">
    <div class="profile__image">
        <img src="{{ $user->profile_image ?? asset('images/default-avatar.png') }}" alt="プロフィール画像" class="profile__image-img">
    </div>
    <button class="profile__edit-button">画像を選択する</button>

    <form action="{{ route('profile.update') }}" method="POST" class="profile__form">
        @csrf
        <input type="text" name="name" placeholder="ユーザー名" value="{{ $user->name }}">
        <input type="text" name="postal_code" placeholder="郵便番号">
        <input type="text" name="address" placeholder="住所">
        <input type="text" name="building" placeholder="建物名">
        <button type="submit" class="profile__form-submit">更新する</button>
    </form>
</main>

@endsection
