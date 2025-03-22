<template>
    <div class="product-management">
        <h2>商品管理</h2>
        
        <!-- 商品登録フォーム -->
        <div class="product-form">
            <h3>商品の登録・編集</h3>
            <form @submit.prevent="handleSubmit" class="form">
                <div class="form-group">
                    <label for="name">商品名</label>
                    <input type="text" id="name" v-model="product.name" required>
                </div>
                <div class="form-group">
                    <label for="price">価格</label>
                    <input type="number" id="price" v-model="product.price" required>
                </div>
                <div class="form-group">
                    <label for="image">画像URL</label>
                    <input type="url" id="image" v-model="product.image">
                </div>
                <button type="submit" class="submit-button">{{ isEditing ? '更新' : '登録' }}</button>
            </form>
        </div>

        <!-- 商品一覧 -->
        <div class="product-list">
            <h3>商品一覧</h3>
            <div class="products">
                <div v-for="product in products" :key="product.id" class="product-card">
                    <img :src="product.image" :alt="product.name" class="product-image">
                    <div class="product-info">
                        <h4>{{ product.name }}</h4>
                        <p>¥{{ product.price.toLocaleString() }}</p>
                    </div>
                    <div class="product-actions">
                        <button @click="editProduct(product)" class="edit-button">編集</button>
                        <button @click="deleteProduct(product.id)" class="delete-button">削除</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ProductManagement',
    data() {
        return {
            product: {
                name: '',
                price: '',
                image: ''
            },
            products: [],
            isEditing: false,
            editingId: null
        }
    },
    methods: {
        handleSubmit() {
            // TODO: 商品の登録・更新処理の実装
            console.log('商品データ:', this.product);
            this.resetForm();
        },
        editProduct(product) {
            this.product = { ...product };
            this.isEditing = true;
            this.editingId = product.id;
        },
        deleteProduct(id) {
            // TODO: 商品の削除処理の実装
            console.log('削除対象ID:', id);
        },
        resetForm() {
            this.product = {
                name: '',
                price: '',
                image: ''
            };
            this.isEditing = false;
            this.editingId = null;
        }
    }
}
</script>

<style scoped>
.product-management {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

h2 {
    color: #333;
    margin-bottom: 2rem;
}

.product-form {
    background: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

.form {
    max-width: 500px;
}

.form-group {
    margin-bottom: 1.5rem;
}

label {
    display: block;
    margin-bottom: 0.5rem;
    color: #666;
}

input {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
}

.submit-button {
    width: 100%;
    padding: 0.75rem;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.2s;
}

.submit-button:hover {
    background-color: #218838;
}

.products {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1.5rem;
}

.product-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.product-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.product-info {
    padding: 1rem;
}

.product-info h4 {
    margin: 0 0 0.5rem 0;
    color: #333;
}

.product-info p {
    margin: 0;
    color: #666;
}

.product-actions {
    padding: 1rem;
    display: flex;
    gap: 0.5rem;
    border-top: 1px solid #eee;
}

.edit-button, .delete-button {
    flex: 1;
    padding: 0.5rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.edit-button {
    background-color: #ffc107;
    color: #000;
}

.edit-button:hover {
    background-color: #e0a800;
}

.delete-button {
    background-color: #dc3545;
    color: white;
}

.delete-button:hover {
    background-color: #c82333;
}
</style> 