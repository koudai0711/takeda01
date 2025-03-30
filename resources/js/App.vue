<template>
    <div class="app">
        <main class="main-content">
            <div v-if="$page.props.auth.user" class="nav-buttons">
                <router-link to="/" class="nav-button">
                    ホーム
                </router-link>
                <router-link to="/inventory" class="nav-button">
                    在庫管理
                </router-link>
                <router-link to="/orders" class="nav-button">
                    発注管理
                </router-link>
                <router-link to="/alerts" class="nav-button">
                    アラート
                </router-link>
                
                <!-- ユーザー情報とログアウト -->
                <div class="user-menu">
                    <span class="user-name">{{ $page.props.auth.user.name }}</span>
                    <button @click="logout" class="logout-button">ログアウト</button>
                </div>
            </div>
            <router-view></router-view>
        </main>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

function logout() {
    router.post('/logout');
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
    position: relative;
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

.user-menu {
    position: absolute;
    right: 0;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.user-name {
    font-weight: 500;
    color: #333;
}

.logout-button {
    padding: 0.5rem 1rem;
    background-color: #f44336;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.logout-button:hover {
    background-color: #d32f2f;
}
</style> 