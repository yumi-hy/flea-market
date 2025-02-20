<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Http\Requests\ExhibitionRequest;

class ItemController extends Controller
{
    public function index()
    {
        // おすすめ商品の取得（例: ランダムで5件取得）
        $recommendations = Item::inRandomOrder()->take(5)->get();

        return view('index', compact('recommendations'));
    }

    public function create()
    {
        return view('item.sell');
    }

    public function store(ExhibitionRequest $request)
    {
        // 画像アップロード処理
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // データ保存
        Item::create([
            'product' => $request->product,
            'product_description' => $request->product_description,
            'image' => $imagePath ?? null,
            'categories' => json_encode($request->categories),// カテゴリーはテーブル作成後確認
            'product_state' => $request->product_state,
            'price' => $request->price,
        ]);

        return redirect()->route('items.index')->with('success', '商品を出品しました！');
    }
}