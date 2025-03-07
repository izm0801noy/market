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
        <a href="/sell" class="header__nav-link header__nav-link--highlight">出品</a>
    @endif
</nav>
@endsection

@section('content')
 <!-- メインコンテンツ -->
    <main class="main">
        <!-- タブメニュー -->
    <div class="main__tabs">
    <a href="/" class="main__tab {{ request()->get('page') ? '' : 'main__tab--active' }}">
        おすすめ
    </a>
    <a href="/?page=mylist" class="main__tab {{ request()->get('page') == 'mylist' ? 'main__tab--active' : '' }}">
        マイリスト
    </a>
</div>

        <!-- 商品一覧 -->
        <div class="main__products">
            @foreach($items as $item)
            <div class="product">
                <div class="product__image">
                    <img src="{{ asset('storage/' . $item->img_url) }}" alt="商品画像" class="product__image-placeholder">
                </div>
                <p class="product__name">
                    <a href="{{ route('products.show', ['id' => $item->id]) }}">{{ $item->name }}</a>
                </p>
                <p class="product__price">価格: ¥{{ number_format($item->price) }}</p>
                <p class="product__condition">状態: {{ $item->condition }}</p>
            </div>
            @endforeach
        </div>
    </main>
@endsection
