<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // 🔹 `$fillable` を統一（重複を削除）
    protected $fillable = [
        'name',
        'brand',
        'description',
        'price',
        'image_paths', // 画像を保存するカラム
        'condition',
        'category_id',
        'user_id',
    ];

    // 🔹 `image_paths` をJSON形式で保存
    protected $casts = [
        'image_paths' => 'array',
    ];

    // 🔹 `getImagePathAttribute()` の修正（配列チェックを追加）
    public function getImagePathAttribute()
    {
        if (is_array($this->image_paths) && count($this->image_paths) > 0) {
            return asset('storage/' . $this->image_paths[0]);
        }
        return asset('storage/default.png'); // 画像がない場合のデフォルト画像
    }
}
