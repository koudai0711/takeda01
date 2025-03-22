<template>
    <div class="login">
        <h2>ユーザー選択</h2>
        <form @submit.prevent="handleLogin" class="login-form">
            <div class="form-group">
                <label for="user">ユーザーを選択してください</label>
                <select id="user" v-model="selectedUser" required>
                    <option value="">選択してください</option>
                    <option v-for="user in users" :key="user.id" :value="user.id">
                        {{ user.name }}
                    </option>
                </select>
            </div>
            <button type="submit" class="login-button">ログイン</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'Login',
    data() {
        return {
            selectedUser: '',
            users: [
                { id: 1, name: '山田太郎' },
                { id: 2, name: '鈴木花子' },
                { id: 3, name: '佐藤一郎' },
                { id: 4, name: '田中優子' },
                { id: 5, name: '中村健一' }
            ]
        }
    },
    methods: {
        handleLogin() {
            // 選択されたユーザーでログイン処理を実行
            const user = this.users.find(u => u.id === this.selectedUser);
            if (user) {
                // 商品一覧ページに遷移
                this.$router.push('/products');
            }
        }
    }
}
</script>

<style scoped>
.login {
    max-width: 400px;
    margin: 0 auto;
    padding: 2rem;
}

h2 {
    color: #333;
    margin-bottom: 2rem;
    text-align: center;
}

.login-form {
    background: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 1.5rem;
}

label {
    display: block;
    margin-bottom: 0.5rem;
    color: #666;
}

select {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    background-color: white;
}

.login-button {
    width: 100%;
    padding: 0.75rem;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.2s;
}

.login-button:hover {
    background-color: #0056b3;
}
</style> 