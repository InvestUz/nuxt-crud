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
                <form>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    name: 'productCreate'
}

</script>
