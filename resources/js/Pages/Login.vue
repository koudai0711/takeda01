<template>
  <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
      <h1 class="text-2xl font-bold text-center mb-6">ユーザー選択</h1>
      
      <form @submit.prevent="login">
        <div class="mb-4">
          <label for="user" class="block text-sm font-medium text-gray-700 mb-2">
            ユーザーを選択してください
          </label>
          <select
            id="user"
            v-model="form.user_id"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
          >
            <option value="">選択してください</option>
            <option v-for="user in users" :key="user.id" :value="user.id">
              {{ user.name }}
            </option>
          </select>
        </div>
        
        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition"
          :disabled="form.processing"
        >
          ログイン
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

// ユーザー一覧（実際のアプリケーションではAPIやpropsから取得する）
const users = [
  { id: 1, name: '山田太郎' },
  { id: 2, name: '鈴木花子' },
  { id: 3, name: '佐藤一郎' },
  { id: 4, name: '田中優子' },
  { id: 5, name: '中村健一' }
];

// フォームの状態
const form = useForm({
  user_id: ''
});

// ログイン処理
function login() {
  form.post('/login', {
    onSuccess: () => {
      // ログイン成功後にリダイレクト
      window.location.href = '/';
    }
  });
}
</script> 