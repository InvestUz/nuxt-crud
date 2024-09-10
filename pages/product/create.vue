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
                  <Loading :title="isLoadingTitle"/>
                </div>
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
</template>

<script>
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


            // console.log("am here")
        }
    }
}

</script>
