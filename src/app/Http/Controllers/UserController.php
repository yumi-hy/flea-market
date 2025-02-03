<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    // トップページ
    public function index()
    {
        return view('index');
    }

    // プロフィール編集
    public function edit()
    {
        $user = Auth::user();
        return view('auth.mypage_profile', compact('user'));
    }

    // プロフィール更新
    public function update(Request $request)
    {
        $user = Auth::user();


    }
}
