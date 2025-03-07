<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
{
    /**
     * ユーザーがこのリクエストを許可するかどうかを決定
     */
    public function authorize()
    {
        return true; // ユーザーの認証制限をかける場合は適宜変更
    }

    /**
     * リクエストに適用するバリデーションルール
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255', // 商品名は必須、最大255文字
            'description' => 'required|string|max:255', // 商品説明は必須、最大255文字
            'product_images' => 'required|array', // 画像のアップロードは必須（配列）
            'product_images.*' => 'image|mimes:jpeg,png', // 各画像はjpeg/png
            'category_id' => 'required|exists:categories,id', // カテゴリー選択必須
            'condition' => 'required|string', // 商品の状態は必須
            'price' => 'required|numeric|min:0', // 価格は必須、数値、0円以上
        ];
    }

    /**
     * カスタムエラーメッセージ
     */
    public function messages()
    {
        return [
            'name.required' => '商品名は必須です。',
            'name.max' => '商品名は255文字以内で入力してください。',
            
            'description.required' => '商品の説明は必須です。',
            'description.max' => '商品の説明は255文字以内で入力してください。',
            
            'product_images.required' => '商品画像のアップロードは必須です。',
            'product_images.*.image' => 'アップロードするファイルは画像（jpegまたはpng）にしてください。',
            'product_images.*.mimes' => '画像の形式はjpegまたはpngにしてください。',
            
            'category_id.required' => '商品のカテゴリーを選択してください。',
            'category_id.exists' => '選択されたカテゴリーが存在しません。',
            
            'condition.required' => '商品の状態を選択してください。',
            
            'price.required' => '販売価格を入力してください。',
            'price.numeric' => '販売価格は数値で入力してください。',
            'price.min' => '販売価格は0円以上にしてください。',
        ];
    }
}
