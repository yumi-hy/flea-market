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
                    <img src="{{ $recommendation->image }}" alt="{{ $recommendation->name }}" width="100">
                    <h3>{{ $recommendation->id }}</h3>
                    <h3>{{ $recommendation->image }}</h3>

                </div>
            @endforeach
        </div>
    </div>

    <!-- マイリスト -->
    <div>
       
    </div>
    
</div>
@endsection
