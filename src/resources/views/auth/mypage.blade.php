@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="profile-info">
    <p>{{ Auth::user()->name }}</p>
    <a href="{{ route('profile.edit') }}" class="edit-button">プロフィールを編集</a>
</div>
@endsection