@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="item-container">
        <!-- 商品画像 -->
        <div class="item-image">
            @if (Str::startsWith($item->image, 'http'))
                <img src="{{ $item->image }}" alt="{{ $item->product }}">
            @else
                <img src="{{ asset('storage/' . ltrim($item->image, '/')) }}" alt="{{ $item->product }}">
            @endif
        </div>

        <!-- 商品詳細 -->
        <div class="item-details">
            <h1>{{ $item->product }}</h1>
            <p class="brand">ブランド名</p>
            <p class="price">¥{{ number_format($item->price) }} <span class="tax-included">（税込）</span></p>

            <div class="actions">
                <div class="action-icons">
                    <span>☆</span>
                    <span>💬</span>
                </div>
                <form action="{{ route('item.purchase', ['id' => $item->id]) }}" method="GET">
                    <button type="submit" class="purchase-btn">購入手続きへ</button>
                </form>
            </div>

            <h2>商品説明</h2>
            <p>{{ $item->product_description }}</p>

            <h2>商品の情報</h2>
            <p class="info-label">カテゴリー
                <span class="category-tag">洋服</span>
                <span class="category-tag">メンズ</span>
            </p>
            <p class="info-label">商品状態
                <span class="product-state">{{ $item->product_state }}</span>
            </p>

            <h2>コメント(1)</h2>
            <div class="comment">
                <span class="comment-icon">○</span>
                <span class="comment-user">admin</span>
                <p class="comment-text">こちらにコメントが入ります。</p>
            </div>

            <h2>商品へのコメント</h2>
            <textarea class="comment-input"></textarea>
            <button class="comment-btn">コメントを送信する</button>
        </div>
    </div>
</div>
@endsection