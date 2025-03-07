@extends('layouts.app')

@section('title', '商品詳細ページ')

@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/products/show.css') }}">
@endsection

@section('search')
 <nav class="header__nav">
    <div class="header__search">
        <input type="text" placeholder="なにをお探しですか？" class="header__search-input">
    </div>

    @if (Auth::check())
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
<div class="product">
    <!-- 商品画像 -->
    <div class="product__image">
        <img src="{{ asset('storage/' . $item->img_url) }}" alt="{{ $item->name }}">
    </div>

    <!-- 商品情報 -->
    <div class="product__info">
        <h1 class="product__title">{{ $item->name }}</h1>

        <div class="product__price">
            <span class="product__price-value">¥{{ number_format($item->price) }}</span>
            <span class="product__price-tax">(税込)</span>
        </div>

        <button class="product__purchase-btn">購入手続きへ</button>

        <!-- 商品説明 -->
        <div class="product__description">
            <h2 class="product__description-title">商品説明</h2>
            <p class="product__description-text">{{ $item->description }}</p>
        </div>

        <!-- 商品の詳細情報 -->
        <div class="product__details">
            <h2 class="product__details-title">商品の情報</h2>
            <div class="product__detail-row">
                <span class="product__label">カテゴリー:</span>
                <span class="product__value">
                    @if($item->category)
                        <span class="product__tag">{{ $item->category->name }}</span>
                    @else
                        <span class="product__tag">未分類</span>
                    @endif
                </span>
            </div>
            <div class="product__detail-row">
                <span class="product__label">商品の状態:</span>
                <span class="product__value">{{ $item->condition }}</span>
            </div>
        </div>

        <!-- コメントセクション -->
        <div class="product-comments">
            <h2 class="product-comments__title">コメント</h2>

            <!-- ✅ コメントがあるかチェック -->
            @if(isset($item->comments) && is_iterable($item->comments) && count($item->comments) > 0)
                <div class="product-comments__list">
                    @foreach($item->comments as $comment)
                        <div class="product-comment">
                            <div class="product-comment__avatar">
                                <img src="{{ asset('storage/' . ($comment->user->avatar ?? 'default-avatar.png')) }}" alt="{{ $comment->user->name ?? 'ゲスト' }}">
                            </div>
                            <div class="product-comment__content">
                                <p class="product-comment__author">{{ $comment->user->name ?? 'ゲスト' }}</p>
                                <p class="product-comment__text">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="product-comments__empty">コメントはまだありません。</p>
            @endif

            <!-- コメント入力フォーム -->
            @if(Auth::check())
            <div class="product-comment-form">
                <h3 class="product-comment-form__title">商品へのコメント</h3>
                <form action="{{ route('comments.store', $item->id) }}" method="POST">
                    @csrf
                    <textarea name="content" class="product-comment-form__input" placeholder="こちらにコメントを入力します。"></textarea>
                    <button type="submit" class="product-comment-form__btn">コメントを投稿する</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
