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
            @foreach ($recommendations as $item)
                <div class="item-card">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100">
                    <h3>{{ $item->name }}</h3>
                </div>
            @endforeach
        </div>
    </div>

    <!-- マイリスト -->
    <div class="tab-content">
        <h2>マイリスト</h2>
        @if(Auth::check())
            @if ($mylist->isNotEmpty())
                <div class="item-list">
                    @foreach ($mylist as $item)
                        <div class="item-card">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100">
                            <h3>{{ $item->name }}</h3>
                        </div>
                    @endforeach
                </div>
            @else
                <p>マイリストに登録された商品はありません。</p>
            @endif
        @else
            <p>マイリストにはログインが必要です。</p>
        @endif
    </div>
</div>
@endsection
