<template>
    <div>
        <h1>{{ message }}</h1>
        <button @click="sendToServer">Hello to server</button>
    </div>
    <div class="button-container">
        <button @click="incrementCounter('-')" :disabled="isButtonDisabled">-</button>
        <h1 style="font-size: 15px">{{ counter }}</h1>
        <button @click="incrementCounter('+')">+</button>
    </div>
    <h1 style="text-align: center">Product List</h1>
    <div class="row1">
    <input type="text" v-model="search" >
    <button @click="getProducts">Search</button>
    <div class="product-list" v-for="product in products">
        <div class="product">
            <h3>{{ product.title }}</h3>
            <p>{{ product.description }}</p>
            <p>Price: ${{ product.price }}</p>
        </div>
    </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            message: "Hello, Vue in Laravel!",
            counter: 0,
            products: [],
            search: ''
        };
    },
    computed: {
        isButtonDisabled() {
            return this.counter === 0
        }
    },
    watch: {
        search() {
            this.getProducts()
        }
    },
    created() {
        this.getProducts()
    },
    methods : {
        sendToServer() {
            axios.get('http://localhost:8000/api/hello')
                .then(res => {
                    // console.log(res.data)
                    this.message = res.data
                });
        },
        incrementCounter(operator) {
            operator==='+' ? this.counter++ : this.counter--
        },
        getProducts() {
            const params = this.search ? `/search?q=${this.search}` :''
            fetch(`https://dummyjson.com/products${params}`)
                .then(res => res.json())
                .then(data => {
                    this.products = data.products
                })
                .catch(e =>{
                    console.log(e)
                })
        }
    }
};
</script>
<style>
.button-container {
    display: flex;
    align-items: center;
}
button {
    margin: 15px;
    width: 40px;
    height: 40px;
}
.product-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Mengatur produk ke tengah-tengah secara horizontal */
    align-items: center;
}
.product {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
    width: 500px;
    text-align: center;
}
.row1 {
    text-align: center;
}
</style>
