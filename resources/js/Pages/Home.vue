<template>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">商品管理システムへようこそ</h1>
    <p class="mb-4">このシステムでは、商品の在庫管理、発注管理、アラート機能をご利用いただけます。</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
      <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">在庫管理</h2>
        <p>商品の在庫状況を確認・管理できます</p>
        <Link href="/inventory" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
          詳細を見る
        </Link>
      </div>
      
      <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">発注管理</h2>
        <p>商品の発注状況を確認・管理できます</p>
        <Link href="/orders" class="mt-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
          詳細を見る
        </Link>
      </div>
      
      <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">アラート</h2>
        <p>在庫不足などのアラートを確認できます</p>
        <Link href="/alerts" class="mt-4 inline-block px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
          詳細を見る
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script> 