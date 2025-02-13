@extends('layouts.app')

@section('title', '商品一覧')

@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/products/index.css') }}">
@endsection

@section('search')
    <div class="header__search">
                <input type="text" placeholder="なにをお探しですか？" class="header__search-input">
    </div>
            <nav class="header__nav">
                <a href="/logout" class="header__nav-link">ログアウト</a>
                <a href="/mypage" class="header__nav-link">マイページ</a>
                <a href="/cart" class="header__nav-link header__nav-link--highlight">出品</a>

            </nav>
@endsection

@section('content')
 <!-- メインコンテンツ -->
    <main class="main">
        <!-- タブメニュー -->
        <div class="main__tabs">
            <a href="#" class="main__tab main__tab--active">おすすめ</a>

            <!-- ログインしているユーザーだけ「マイリスト」を表示 -->
            @auth
                <a href="/mylist" class="main__tab">マイリスト</a>
            @endauth
        </div>

        <!-- 商品一覧 -->
        <div class="main__products">
            @foreach(range(1, 6) as $index)
            <div class="product">
                <div class="product__image">
                    <img src="https://example.com/product-placeholder.png" alt="商品画像" class="product__image-placeholder">
                </div>
                <p class="product__name">商品名 {{ $index }}</p>
            </div>
            @endforeach
        </div>
    </main>
@endsection

    