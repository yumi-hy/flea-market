@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="tabs">
        <span class="tab-title">おすすめ</span>
        <span class="tab-title">マイリスト</span>
    </div>
    <hr class="tab-divider"> <!-- 横ライン -->

    <!-- おすすめ（ログイン・ログアウト関係なく表示） -->
    <div class="tab-content">
        <h2>おすすめ</h2>
        <div class="item-list">
            @foreach ($recommendations as $recommendation)
                <div class="item-card">
                    <a href="{{ route('item.show', ['id' => $recommendation->id]) }}">
                        @php
                            $imagePath = $recommendation->image;
                        @endphp

                        @if (Str::startsWith($imagePath, 'http'))
                            <!-- 画像URLがhttpから始まる場合 -->
                            <img src="{{ $imagePath }}" alt="{{ $recommendation->product }}" width="100">
                        @else
                            <!-- storage内の画像を表示 -->
                            <img src="{{ asset('storage/' . ltrim($imagePath, '/')) }}" alt="{{ $recommendation->product }}" width="100">
                        @endif
                    </a>
                    <h3>{{ $recommendation->product }}</h3>
                </div>
            @endforeach
        </div>
    </div>

    <!-- マイリスト -->
    <div>
       
    </div>
    
</div>
@endsection
