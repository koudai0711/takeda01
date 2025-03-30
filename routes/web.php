<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// フォールバックルート（上記で定義されていないルートに対応）
Route::get('/{any}', function () {
    return Inertia::render('Home');
})->where('any', '.*');
