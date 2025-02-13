<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザープロフィール</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__content">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="header__logo">
            <div class="header__search-box">
                <input type="text" placeholder="なにをお探しですか？" class="header__search-input">
            </div>
            <div class="header__links">
                <a href="#" class="header__link">ログアウト</a>
                <a href="#" class="header__link">マイページ</a>
                <a href="#" class="header__link">出品</a>
            </div>
        </div>
    </header>

    <main class="profile__container">
        <div class="profile__section">
            <div class="profile__header">
                <div class="profile__image">
                    <img src="{{ $user->profile_image ?? asset('images/default-avatar.png') }}" alt="プロフィール画像">
                </div>
                <div class="profile__info">
                    <h1 class="profile__username">{{ $user->name }}</h1>
                    <a href="{{ route('profile.edit') }}" class="profile__edit-button">プロフィール編集</a>
                </div>
            </div>
        </div>

        <!-- タブメニュー -->
        <div class="profile__tabs">
            <input type="radio" id="tab-listed" name="tab-group" class="profile__tab-radio" checked>
            <label for="tab-listed" class="profile__tab-label">出品した商品</label>

            <input type="radio" id="tab-purchased" name="tab-group" class="profile__tab-radio">
            <label for="tab-purchased" class="profile__tab-label">購入した商品</label>
        </div>

        <!-- タブの中身 -->
        <div class="profile__tab-content">
            <div class="profile__products-grid profile__tab-panel" id="listed-items">
                @foreach($listedItems as $item)
                <div class="profile__product-card">
                    <div class="profile__product-image">
                        <img src="{{ $item->image_url ?? asset('images/placeholder.png') }}" alt="{{ $item->name }}">
                    </div>
                    <div class="profile__product-name">{{ $item->name }}</div>
                </div>
                @endforeach
            </div>

            <div class="profile__products-grid profile__tab-panel" id="purchased-items">
                @foreach($purchasedItems as $item)
                <div class="profile__product-card">
                    <div class="profile__product-image">
                        <img src="{{ $item->image_url ?? asset('images/placeholder.png') }}" alt="{{ $item->name }}">
                    </div>
                    <div class="profile__product-name">{{ $item->name }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>
