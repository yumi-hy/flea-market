<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        // おすすめ商品の取得（例: ランダムで5件取得）
        $recommendations = Item::inRandomOrder()->take(5)->get();

        return view('index', compact('recommendations'));
    }
}