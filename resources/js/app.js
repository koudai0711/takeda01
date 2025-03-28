import './bootstrap';

// Vue.jsを使用せず、シンプルなJavaScriptコードに変更
document.addEventListener('DOMContentLoaded', function() {
    // ページが読み込まれたときの初期化処理
    console.log('商品管理システムが読み込まれました');
    
    // 基本的なルーティング処理
    const path = window.location.pathname;
    
    // ルーティングに基づいてコンテンツを表示
    const appElement = document.getElementById('app');
    if (appElement) {
        if (path === '/' || path === '') {
            appElement.innerHTML = '<h1>商品管理システムへようこそ</h1>';
        } else if (path === '/products') {
            appElement.innerHTML = '<h1>商品一覧</h1>';
        } else if (path === '/manage') {
            appElement.innerHTML = '<h1>商品管理</h1>';
        } else if (path === '/login') {
            appElement.innerHTML = '<h1>ログイン</h1>';
        } else {
            appElement.innerHTML = '<h1>ページが見つかりません</h1>';
        }
    }
});
