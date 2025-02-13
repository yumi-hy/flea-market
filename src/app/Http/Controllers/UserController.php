<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // トップページ
    public function index()
    {
        return view('index');
    }

    // 会員登録
    public function register(RegisterRequest $request)
    {
        // ユーザー作成
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // ログイン処理
        Auth::login($user);

        // プロフィール設定画面へリダイレクト
        return redirect()->route('profile.edit');
    }

    // プロフィール編集
    public function edit()
    {
        $user = Auth::user();
        return view('auth.mypage_profile', compact('user'));
    }

    // プロフィール更新
    public function update(AddressRequest $request)
    {
        $user = Auth::user();

        // ユーザー情報更新
        $user->update($request->only(['name','postcode', 'address', 'building']));

        return redirect()->route('index');
    }

    // ログイン処理
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'login_error' => 'ログイン情報が登録されていません',
            ])->withInput(); // 入力情報を保持
        }

        return redirect()->route('index');
    }
}
