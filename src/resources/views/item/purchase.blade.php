@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase-container">
    <div class="left-section">
        <div class="product-container">
            <!-- 商品画像 -->
            <div class="product-image">
                @if (Str::startsWith($item->image, 'http'))
                    <img src="{{ $item->image }}" alt="{{ $item->product }}">
                @else
                    <img src="{{ asset('storage/' . ltrim($item->image, '/')) }}" alt="{{ $item->product }}">
                @endif
            </div>

            <!-- 商品情報 -->
            <div class="product-info">
                <h2>{{ $item->product }}</h2>
                <p class="price">¥{{ number_format($item->price) }}</p>
            </div>
        </div>
        <hr>

        <!-- 支払い方法 -->
        <div class="payment-method">
            <h3>支払い方法</h3>
            <form method="POST" action="{{ route('purchase.updatePayment') }}">
                @csrf
                <select name="payment_method" onchange="this.form.submit()">
                    <option value="">選択してください</option>
                    <option value="コンビニ支払い" {{ session('payment_method') == 'コンビニ支払い' ? 'selected' : '' }}>コンビニ支払い</option>
                    <option value="カード支払い" {{ session('payment_method') == 'カード支払い' ? 'selected' : '' }}>カード支払い</option>
                </select>
            </form>
        </div>
        <hr>

        <!-- 配送先 -->
        <div class="shipping-address">
            <h3>配送先</h3>
            <p>〒 {{ $user->postcode ?? '未登録' }}</p>
            <p>{{ $user->address ?? '未登録' }}</p>
            <p>{{ $user->building ?? '' }}</p>
            <a href="{{ route('purchase.address') }}" class="change-address">変更する</a>
        </div>
        <hr>
    </div>

    <!-- 購入サマリー -->
    <div class="right-section">
        <div class="summary-box">
            <div class="summary-item">
                <span>商品代金</span>
                <span>¥{{ number_format($item->price) }}</span>
            </div>
            <div class="summary-item">
                <span>支払い方法</span>
                <span>{{ session('payment_method', '選択されていません') }}</span>
            </div>
        </div>
        <button class="purchase-button">購入する</button>
    </div>
</div>
@endsection