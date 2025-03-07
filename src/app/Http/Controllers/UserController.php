<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * プロフィールページを表示
     */
    public function show()
    {
       $user = Auth::user();
           return view('profile.index', compact('user'));
    }


    /**
     * プロフィール編集画面を表示
     */
    public function edit()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', 'ログインしてください。');
        }

            return view('profile.edit', compact('user')); // profile/edit.blade.php を表示
    }

    /**
     * プロフィールを更新
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // ユーザー情報を更新
        $user->name = $request->input('name');
        $user->postal_code = $request->input('postal_code');
        $user->address = $request->input('address');
        $user->building_name = $request->input('building_name');

        // プロフィール画像のアップロード処理
        if ($request->hasFile('profile_image')) {
            // 既存の画像を削除
            if ($user->profile_image) {
                Storage::delete($user->profile_image);
            }

            // 新しい画像を保存
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        // データベースに保存
        $user->save();

        // 更新後にプロフィール編集画面へリダイレクト
        return redirect()->route('profile.edit')->with('success', 'プロフィールが更新されました！');
    }
}
