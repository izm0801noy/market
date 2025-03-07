@extends('layouts.app')

@section('title', '商品一覧')

@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/products/index.css') }}">
@endsection

@section('search')
 <nav class="header__nav">
    <!-- 検索ボックスを中央に配置 -->
    <div class="header__search">
        <input type="text" placeholder="なにをお探しですか？" class="header__search-input">
    </div>

    @if (Auth::check())
        <!-- ナビゲーションを右揃え -->
        <form action="{{ route('logout') }}" method="POST" class="header__nav-form">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
        <a href="/mypage" class="header__nav-link">マイページ</a>
        <a href="/cart" class="header__nav-link header__nav-link--highlight">出品</a>
    @endif
</nav>


        
    

@endsection

@section('content')
 <!-- メインコンテンツ -->
    <main class="main">
        <!-- タブメニュー -->
    <div class="main__tabs">
    <!-- 「おすすめ」タブ: URL に "page" パラメータがない場合アクティブ -->
    <a href="/" class="main__tab {{ request()->get('page') ? '' : 'main__tab--active' }}">
        おすすめ
    </a>

    <!-- 「マイリスト」タブ: URL に "page=mylist" がある場合アクティブ -->
    <a href="/?page=mylist" class="main__tab {{ request()->get('page') == 'mylist' ? 'main__tab--active' : '' }}">
        マイリスト
    </a>
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

    