<template>
    <div class="mt-5 container">
        <h1>Create page</h1>
        <div class="card">
            <div class="card-header">
                <h4>Add product
                    <NuxtLink to="/" class="btn btn-danger">Back</NuxtLink>
                </h4>
            </div>
            <div class="card-body">
                <!-- Display error messages -->
                <div v-if="errorList.length" class="alert alert-danger">
                    <ul>
                        <li v-for="(error, index) in errorList" :key="index">{{ error }}</li>
                    </ul>
                </div>

                <!-- Loading spinner -->
                <div v-if="isLoading">
                    <Loading :title="isLoadingTitle" />
                </div>

                <!-- Form -->
                <div v-else>
                    <form @submit.prevent="saveProduct">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" v-model="product.name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="color">Color</label>
                            <input type="text" v-model="product.color" class="form-control" id="color" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" v-model="product.email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" v-model="product.phone" class="form-control" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'productCreate',
    data() {
        return {
            product: {
                name: '',
                color: '',
                email: '',
                phone: '',
            },
            isLoading: false,
            isLoadingTitle: 'Loading',
            errorList: []  
        }
    },
    methods: {
        saveProduct() {
            this.isLoading = true;
            this.isLoadingTitle = 'Saving';

            axios.post('http://127.0.0.1:8000/api/productss', this.product)
                .then(res => {
                    console.log(res, 'Response');
                    this.isLoading = false;
                    this.isLoadingTitle = 'Loading';

                    this.resetForm();
                })
                .catch(error => {
                    console.log(error, 'errors');
                    this.isLoading = false;

                    if (error.response && error.response.data && error.response.data.error) {
                        this.errorList = Array.isArray(error.response.data.error) ? error.response.data.error : [error.response.data.error];
                    } else {
                        this.errorList = ['An unexpected error occurred.'];
                    }
                });
        },
        resetForm() {
            this.product = {
                name: '',
                color: '',
                email: '',
                phone: '',
            };
            this.errorList = [];  
        }
    }
}
</script>

<style scoped>
.alert-danger {
    margin-bottom: 20px;
}
</style>
