<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('products/index'); // 商品一覧画面のビューを返す
    }
}
