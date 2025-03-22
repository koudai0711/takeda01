<template>
    <div class="product-list">
        <h2>商品一覧</h2>
        
        <!-- 選択した商品リスト -->
        <div class="selected-products">
            <h3>選択した商品</h3>
            <div v-if="selectedProducts.length === 0" class="empty-message">
                商品を選択してください
            </div>
            <div v-else class="selected-list">
                <div v-for="product in selectedProducts" :key="product.id" class="selected-item">
                    <div class="product-details">
                        <img :src="product.image" :alt="product.name" class="product-image">
                        <div class="product-info">
                            <h4>{{ product.name }}</h4>
                            <p>¥{{ product.price.toLocaleString() }}</p>
                        </div>
                    </div>
                    <div class="quantity-controls">
                        <button @click="decreaseQuantity(product)" class="quantity-button">-</button>
                        <span class="quantity">{{ product.quantity }}</span>
                        <button @click="increaseQuantity(product)" class="quantity-button">+</button>
                    </div>
                </div>
            </div>
            <div v-if="selectedProducts.length > 0" class="total-section">
                <div class="total">
                    <span>合計金額:</span>
                    <span class="total-amount">¥{{ totalAmount.toLocaleString() }}</span>
                </div>
                <div class="action-buttons">
                    <button @click="clearSelection" class="clear-button">全て削除</button>
                    <button @click="undoLastAction" class="undo-button">1つ戻る</button>
                    <button @click="confirmTotal" class="confirm-button">合計</button>
                </div>
            </div>
        </div>

        <!-- 商品一覧 -->
        <div class="products">
            <div v-for="product in products" :key="product.id" class="product-card" @click="selectProduct(product)">
                <img :src="product.image" :alt="product.name" class="product-image">
                <div class="product-info">
                    <h4>{{ product.name }}</h4>
                    <p>¥{{ product.price.toLocaleString() }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'ProductList',
    data() {
        return {
            products: [],
            selectedProducts: [],
            actionHistory: []
        }
    },
    computed: {
        totalAmount() {
            return this.selectedProducts.reduce((total, product) => {
                return total + (product.price * product.quantity);
            }, 0);
        }
    },
    methods: {
        selectProduct(product) {
            const existingProduct = this.selectedProducts.find(p => p.id === product.id);
            if (existingProduct) {
                this.increaseQuantity(existingProduct);
            } else {
                this.selectedProducts.push({
                    ...product,
                    quantity: 1
                });
                this.actionHistory.push({
                    type: 'add',
                    product: { ...product }
                });
            }
        },
        increaseQuantity(product) {
            product.quantity++;
            this.actionHistory.push({
                type: 'increase',
                productId: product.id
            });
        },
        decreaseQuantity(product) {
            if (product.quantity > 1) {
                product.quantity--;
                this.actionHistory.push({
                    type: 'decrease',
                    productId: product.id
                });
            } else {
                this.removeProduct(product);
            }
        },
        removeProduct(product) {
            const index = this.selectedProducts.findIndex(p => p.id === product.id);
            if (index !== -1) {
                this.selectedProducts.splice(index, 1);
                this.actionHistory.push({
                    type: 'remove',
                    product: { ...product }
                });
            }
        },
        clearSelection() {
            if (confirm('選択した商品を全て削除しますか？')) {
                this.actionHistory.push({
                    type: 'clear',
                    products: [...this.selectedProducts]
                });
                this.selectedProducts = [];
            }
        },
        undoLastAction() {
            const lastAction = this.actionHistory.pop();
            if (!lastAction) return;

            switch (lastAction.type) {
                case 'add':
                    this.removeProduct(lastAction.product);
                    break;
                case 'increase':
                    const productToDecrease = this.selectedProducts.find(p => p.id === lastAction.productId);
                    if (productToDecrease) {
                        productToDecrease.quantity--;
                    }
                    break;
                case 'decrease':
                    const productToIncrease = this.selectedProducts.find(p => p.id === lastAction.productId);
                    if (productToIncrease) {
                        productToIncrease.quantity++;
                    }
                    break;
                case 'remove':
                    this.selectedProducts.push(lastAction.product);
                    break;
                case 'clear':
                    this.selectedProducts = [...lastAction.products];
                    break;
            }
        },
        confirmTotal() {
            const message = this.selectedProducts.map(p => 
                `${p.name}: ${p.quantity}個 × ¥${p.price.toLocaleString()} = ¥${(p.quantity * p.price).toLocaleString()}`
            ).join('\n') + `\n\n合計金額: ¥${this.totalAmount.toLocaleString()}`;
            
            alert(message);
        }
    }
}
</script>
<style scoped>
.product-list {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}
h2 {
    color: #333;
    margin-bottom: 2rem;
}
.selected-products {
    background: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}
.empty-message {
    text-align: center;
    color: #666;
    padding: 2rem;
    background: #f8f9fa;
    border-radius: 4px;
}
.selected-list {
    margin-bottom: 1.5rem;
}
.selected-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    border-bottom: 1px solid #eee;
}
.product-details {
    display: flex;
    align-items: center;
    gap: 1rem;
}
.product-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 4px;
}
.product-info h4 {
    margin: 0 0 0.5rem 0;
    color: #333;
}
.product-info p {
    margin: 0;
    color: #666;
}
.quantity-controls {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.quantity-button {
    width: 30px;
    height: 30px;
    border: none;
    border-radius: 4px;
    background-color: #f8f9fa;
    cursor: pointer;
    font-size: 1.2rem;
    display: flex;
    align-items: center;
    justify-content: center;
}
.quantity {
    min-width: 30px;
    text-align: center;
}
.total-section {
    border-top: 1px solid #eee;
    padding-top: 1rem;
}
.total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    font-size: 1.2rem;
    font-weight: bold;
}
.total-amount {
    color: #28a745;
}
.action-buttons {
    display: flex;
    gap: 1rem;
}
.clear-button, .undo-button, .confirm-button {
    flex: 1;
    padding: 0.75rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.2s;
}
.clear-button {
    background-color: #dc3545;
    color: white;
}
.clear-button:hover {
    background-color: #c82333;
}
.undo-button {
    background-color: #6c757d;
    color: white;
}
.undo-button:hover {
    background-color: #5a6268;
}
.confirm-button {
    background-color: #28a745;
    color: white;
}
.confirm-button:hover {
    background-color: #218838;
}
.products {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1.5rem;
}
.product-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.2s;
}
.product-card:hover {
    transform: translateY(-2px);
}
</style> 