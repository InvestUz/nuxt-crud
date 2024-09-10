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
                <div v-if="isLoading">
                    <Loading :title="isLoadingTitle" />
                </div>
                <div v-else>
                    <form @submit.prevent="saveProduct">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" v-model="product.name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="color">Color</label>
                            <input type="text" v-model="product.color" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" v-model="product.email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" v-model="product.phone" class="form-control">
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

        }
    },
    methods: {
        saveProduct() {
            this.isLoading = true;
            this.isLoadingTitle = 'Saving'

            // this.product.name = ""
            // this.product.color = ""
            // this.product.email = ""
            // this.product.phone = ""

            axios.post('http://127.0.0.1:8000/api/productss', this.product)
                .then(res => {
                    console.log(res, 'Response');
                    this.isLoading = false;
                    this.isLoadingTitle = 'Loading';

                    this.product.name = ""
                    this.product.color = ""
                    this.product.email = ""
                    this.product.phone = ""
                    this.resetForm();
                })
                .catch(err => {
                    console.error(err);
                    this.isLoading = false;
                    this.isLoadingTitle = 'Loading';
                });
            }
        }
    }

</script>
