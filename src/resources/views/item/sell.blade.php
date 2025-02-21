@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell__content">
  <div class="sell-form__heading">
    <h2>商品の出品</h2>
  </div>

  <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">商品画像</span>
      </div>
      <div class="form__group-content">
        <input type="file" name="image" accept="image/*" required />
        @error('image')
          <p class="error-message">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">商品の詳細</span>
      </div>

      <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">カテゴリー</span>
      </div>
      <div class="form__group-content category-buttons">
          @php
            $categories = ['ファッション', '家電', 'インテリア', 'レディース', 'メンズ', 'コスメ', '本', 'ゲーム', 'スポーツ', 'キッチン', 'ハンドメイド', 'アクセサリー', 'おもちゃ', 'ベビー・キッズ'];
          @endphp

          @foreach ($categories as $category)
            <label class="category-label">
              <input type="checkbox" name="categories[]" value="{{ $category }}" />
              <span>{{ $category }}</span>
            </label>
          @endforeach
        </div>
        @error('categories')
          <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">商品の状態</span>
        </div>
        <div class="form__group-content">
          <select name="product_state" required>
            <option value="" disabled {{ old('product_state') ? '' : 'selected' }}>選択してください</option>
            <option value="良好" {{ old('product_state') == '良好' ? 'selected' : '' }}>良好</option>
            <option value="目立った傷や汚れなし" {{ old('product_state') == '目立った傷や汚れなし' ? 'selected' : '' }}>目立った傷や汚れなし</option>
            <option value="やや傷や汚れあり" {{ old('product_state') == 'やや傷や汚れあり' ? 'selected' : '' }}>やや傷や汚れあり</option>
            <option value="状態が悪い" {{ old('product_state') == '状態が悪い' ? 'selected' : '' }}>状態が悪い</option>
          </select>
          @error('product_state')
            <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">商品名と説明</span>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">商品名</span>
        </div>
        <div class="form__group-content">
          <input type="text" name="product" value="{{ old('product') }}" required />
          @error('product')
            <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">ブランド名</span>
        </div>
        <div class="form__group-content">
          <input type="text" name="brand" />
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">商品の説明</span>
        </div>
        <div class="form__group-content">
          <textarea name="product_description" rows="5" required>{{ old('product_description') }}</textarea>
          @error('product_description')
            <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">販売価格</span>
        </div>
        <div class="form__group-content">
          <div class="price-input">
            <span class="price-symbol">￥</span>
            <input type="number" name="price" min="0" value="{{ old('price') }}" required />
          </div>
          @error('price')
            <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>
    
    <div class="form__button">
      <button type="submit" class="form__button-submit">出品する</button>
    </div>
  </form>
</div>
@endsection