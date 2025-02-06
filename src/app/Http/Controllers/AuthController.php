<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    public function index()
    {
        return view('home'); 
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), 
        ]);

        auth()->login($user);

        return redirect()->route('home')->with('success', '登録が完了しました！');
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (!auth()->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return back()->withErrors(['email' => '認証に失敗しました。'])->onlyInput('email');
        }

        return redirect()->route('home');
    }
}
