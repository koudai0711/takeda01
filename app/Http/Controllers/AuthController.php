<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class AuthController extends Controller
{
    /**
     * ログイン画面を表示
     */
    public function showLogin()
    {
        // すでにセッションにユーザー情報がある場合はホームページにリダイレクト
        if (Session::has('user')) {
            return redirect('/');
        }

        // ユーザーリスト（実際のアプリケーションではDBから取得）
        $users = [
            ['id' => 1, 'name' => '山田太郎'],
            ['id' => 2, 'name' => '鈴木花子'],
            ['id' => 3, 'name' => '佐藤一郎'],
            ['id' => 4, 'name' => '田中優子'],
            ['id' => 5, 'name' => '中村健一'],
        ];
        
        return Inertia::render('Login', [
            'users' => $users
        ]);
    }

    /**
     * ログイン処理
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|numeric',
        ]);

        // 本来はDBからユーザーを取得するべきですが、簡易的に固定データを使用
        $users = [
            1 => ['id' => 1, 'name' => '山田太郎'],
            2 => ['id' => 2, 'name' => '鈴木花子'],
            3 => ['id' => 3, 'name' => '佐藤一郎'],
            4 => ['id' => 4, 'name' => '田中優子'],
            5 => ['id' => 5, 'name' => '中村健一'],
        ];

        $user = $users[$validated['user_id']] ?? null;

        if (!$user) {
            return back()->withErrors([
                'user_id' => 'ユーザーが見つかりません',
            ]);
        }

        // セッションにユーザー情報を格納
        Session::put('user', $user);

        return redirect()->intended('/');
    }

    /**
     * ログアウト処理
     */
    public function logout()
    {
        Session::forget('user');
        return redirect('/login');
    }
} 