<?php 

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category; // 🔹 Category モデルを追加
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ExhibitionRequest;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * 商品一覧ページ
     */
    public function index()
    {
        $items = Item::all();
        return view('products.index', compact('items'));
    }

    /**
     * マイリストページ
     */
    public function mylist()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'ログインが必要です。');
        }

        $user = Auth::user();
        $mylistItems = $user->mylistItems()->get(); 

        return view('mylist', compact('mylistItems'));
    }

    /**
     * 商品詳細ページ
     */
    public function show($item_id)
    {
        $item = Item::findOrFail($item_id);
        return view('products.show', compact('item'));
    }

    /**
     * 商品にコメントを投稿する
     */
    public function storeComment(Request $request, Item $item)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        DB::table('comments')->insert([
            'item_id' => $item->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('products.show', $item->id)->with('success', 'コメントを投稿しました！');
    }

    /**
     * 出品画面を表示
     */
    public function create()
    {
        $categories = Category::all(); // 🔹 カテゴリー一覧を取得
        return view('products.create', compact('categories'));
    }

    /**
     * 商品の登録を処理する
     */
    public function store(ExhibitionRequest $request)
    {
        // 🔹 バリデーション済みデータを取得
        $validated = $request->validated();

        // 🔹 商品データの作成
        $item = new Item();
        $item->name = $validated['name'];
        $item->brand = $validated['brand'] ?? null;
        $item->description = $validated['description'];
        $item->price = $validated['price'];
        $item->user_id = Auth::id();
        $item->category_id = $validated['category_id']; // 🔹 カテゴリーを保存

        // 🔹 画像がアップロードされた場合の処理
        if ($request->hasFile('product_images')) {
            $imagePaths = [];
            foreach ($request->file('product_images') as $image) {
                $path = $image->store('public/product_images'); // ストレージに保存
                $imagePaths[] = str_replace('public/', 'storage/', $path); // パスを変換
            }
            $item->image_paths = json_encode($imagePaths); // JSONとして保存
        }

        $item->save();

        return redirect()->route('products.index')->with('success', '商品を出品しました！');
    }
}
