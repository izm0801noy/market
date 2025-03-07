<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール設定</title>
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
        <h1 class="profile__title">プロフィール設定</h1>
        
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="profile__form">
            @csrf
            @method('PUT')
            
            <div class="profile__image">
                <div class="profile__image-circle">
                    @if($user->profile_image)
                        <img src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像">
                    @else
                        <img src="{{ asset('images/default-profile.png') }}" alt="デフォルト画像">
                    @endif
                </div>
                <label for="profile_image" class="profile__image-select-button">画像を選択する</label>
                <input type="file" id="profile_image" name="profile_image" class="profile__image-input">
            </div>

            <div class="profile__form-group">
                <label for="name" class="profile__label">ユーザー名</label>
                <input type="text" id="name" name="username" class="profile__input" value="{{ old('name', $user->name) }}">
            </div>

            <div class="profile__form-group">
                <label for="postal_code" class="profile__label">郵便番号</label>
                <input type="text" id="postal_code" name="postal_code" class="profile__input" value="{{ old('postal_code', $user->postal_code) }}">
            </div>

            <div class="profile__form-group">
                <label for="address" class="profile__label">住所</label>
                <input type="text" id="address" name="address" class="profile__input" value="{{ old('address', $user->address) }}">
            </div>

            <div class="profile__form-group">
                <label for="building_name" class="profile__label">建物名</label>
                <input type="text" id="building_name" name="building_name" class="profile__input" value="{{ old('building_name', $user->building_name) }}">
            </div>

            <button type="submit" class="profile__submit-button">更新する</button>
        </form>
    </main>
</body>
</html>
