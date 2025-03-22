<template>
    <div class="home">
        <h1>商品管理システム</h1>
        <p>ようこそ！このシステムでは以下の機能を利用できます：</p>
        <ul>
            <li>商品の登録・編集・削除</li>
            <li>商品一覧の表示と合計金額の計算</li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'Home'
}
</script>

<style scoped>
.home {
    max-width: 800px;
    margin: 0 auto;
}

h1 {
    color: #333;
    margin-bottom: 2rem;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
}

li:last-child {
    border-bottom: none;
}
</style> 