<template>
    <div class="app">
        <nav class="navbar">
            <router-link to="/">ホーム</router-link>
            <router-link to="/products">商品一覧</router-link>
            <router-link to="/manage">商品管理</router-link>
            <router-link to="/login">ログイン</router-link>
        </nav>
        <main>
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
    font-family: Arial, sans-serif;
}

.navbar {
    background-color: #f8f9fa;
    padding: 1rem;
    margin-bottom: 2rem;
    display: flex;
    justify-content: center;
    gap: 2rem;
}

.navbar a {
    color: #333;
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.navbar a:hover {
    background-color: #e9ecef;
}

.navbar a.router-link-active {
    background-color: #007bff;
    color: white;
}

main {
    padding: 0 1rem;
}
</style> 