<template>
    <div class="app">
        <main class="main-content">
            <div class="nav-buttons">
                <router-link to="/" class="nav-button">
                    ホーム
                </router-link>
                <router-link to="/login" class="nav-button">
                    ユーザー選択
                </router-link>
                <router-link to="/products" class="nav-button">
                    商品一覧
                </router-link>
                <router-link to="/manage" class="nav-button">
                    商品管理
                </router-link>
            </div>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
export default {
    name: 'App'
}
</script>

<style>
.app {
    font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
    min-height: 100vh;
    background-color: #f8f9fa;
}

.main-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.nav-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.nav-button {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    background-color: #ffffff;
    color: #333333;
    text-decoration: none;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    transition: all 0.3s ease;
    font-size: 1rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.nav-button:hover {
    background-color: #f0f0f0;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.nav-button.router-link-active {
    background-color: #007bff;
    color: #ffffff;
    border-color: #0056b3;
}

.nav-button.router-link-active:hover {
    background-color: #0056b3;
}
</style> 