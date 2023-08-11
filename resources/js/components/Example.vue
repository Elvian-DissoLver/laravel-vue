<template>
    <div>
        <h1>{{ message }}</h1>
        <button @click="sendToServer">Hello to server</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: "Hello, Vue in Laravel!",
        };
    },
    methods : {
        sendToServer() {
            axios.get('http://localhost:8000/api/hello')
                .then(res => {
                    // console.log(res.data)
                    this.message = res.data
                });
        }
    }
};
</script>
