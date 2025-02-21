<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Category;
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
        // カテゴリーの取得
        $categories = Category::all();
        return view('item.sell', compact('categories'));
    }

    public function store(ExhibitionRequest $request)
    {
        // 画像アップロード処理
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // 商品データ保存
        $item = Item::create([
            'product' => $request->product,
            'product_description' => $request->product_description,
            'image' => $imagePath,
            'product_state' => $request->product_state,
            'price' => $request->price,
        ]);

        // カテゴリーを中間テーブルに保存
        if ($request->categories) {
            $item->categories()->attach($request->categories);
        }

        return redirect()->route('items.index')->with('success', '商品を出品しました！');
    }
}