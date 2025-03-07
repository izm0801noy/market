@extends('layouts.app')

@section('title', '商品の出品')

@section('CSS')
    <link rel="stylesheet" href="{{ asset('css/products/create.css') }}">
@endsection

@section('content')
<div class="product-submission">
    <h1 class="product-submission__title">商品の出品</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="product-submission__form">
        @csrf
        
        <!-- 🔹 商品画像のアップロード -->
        <div class="product-submission__section">
            <h2 class="product-submission__section-title">商品画像</h2>
            <div class="product-submission__image-upload">
                <div class="product-submission__image-box">
                    <label class="product-submission__image-btn">
                        画像を追加する
                        <input type="file" name="product_images[]" multiple class="product-submission__image-input" accept="image/*">
                    </label>
                </div>
            </div>
            @error('product_images')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- 🔹 カテゴリー選択 -->
        <div class="product-submission__section">
            <h2 class="product-submission__section-title">カテゴリー</h2>
            <div class="product-submission__category-buttons">
                @foreach(["1" => "ファッション", "2" => "家電", "3" => "インテリア", "4" => "レディース", "5" => "メンズ", "6" => "コスメ", "7" => "本", "8" => "ゲーム", "9" => "スポーツ", "10" => "キッチン", "11" => "ハンドメイド", "12" => "アクセサリー", "13" => "おもちゃ", "14" => "ベビー・キッズ"] as $id => $category)
                    <label class="product-submission__category-btn">
                        <input type="radio" name="category_id" value="{{ $id }}" class="category-input"
                            {{ old('category_id') == $id ? 'checked' : '' }}>
                        {{ $category }}
                    </label>
                @endforeach
            </div>
            @error('category_id')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- 🔹 商品名と説明 -->
        <div class="product-submission__section">
            <h2 class="product-submission__section-title">商品名と説明</h2>

            <div class="product-submission__group">
                <label for="name" class="product-submission__label">商品名</label>
                <input type="text" name="name" id="name" class="product-submission__input" value="{{ old('name') }}">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="product-submission__group">
                <label for="description" class="product-submission__label">商品の説明</label>
                <textarea name="description" id="description" class="product-submission__textarea">{{ old('description') }}</textarea>
                @error('description')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="product-submission__group">
                <label for="price" class="product-submission__label">販売価格</label>
                <div class="product-submission__price-input">
                    <span class="product-submission__currency-symbol">¥</span>
                    <input type="number" name="price" id="price" class="product-submission__input" value="{{ old('price') }}">
                </div>
                @error('price')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="product-submission__actions">
            <button type="submit" class="product-submission__submit-btn">出品する</button>
        </div>
    </form>
</div>
@endsection
