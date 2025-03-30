<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAuth;

// 認証不要のルート
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 認証が必要なルート
Route::middleware(CheckAuth::class)->group(function () {
    // ホームページ
    Route::get('/', function () {
        return Inertia::render('Home');
    });
    
    // 在庫管理ページ（後で実装）
    Route::get('/inventory', function () {
        return Inertia::render('Inventory/Index');
    })->name('inventory.index');
    
    // 発注管理ページ（後で実装）
    Route::get('/orders', function () {
        return Inertia::render('Orders/Index');
    })->name('orders.index');
    
    // アラートページ（後で実装）
    Route::get('/alerts', function () {
        return Inertia::render('Alerts/Index');
    })->name('alerts.index');
});
