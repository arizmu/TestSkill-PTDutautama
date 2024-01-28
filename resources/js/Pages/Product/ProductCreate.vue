<script setup>
import { reactive } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, Link  } from '@inertiajs/vue3';

const form = reactive({
    name: null,
    price: null,
    stock: null,
    description: null,
})

function submit() {
    router.post('/product/store', form);
}

</script>

<template>
    <Head title="Product Create" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product Create</h2>
        </template>

        <div class="p-12">
            <form @submit.prevent="submit" class="max-w-sm mx-auto">
                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Product Name
                    </label>
                    <input type="text" v-model="form.name" name="name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="product name" required>
                </div>
                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Price
                    </label>
                    <input type="number" v-model="form.price" name="price"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="price" required>
                </div>
                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Stock
                    </label>
                    <input type="number" v-model="form.stock" name="stock"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="stock" required>
                </div>
                <div class="mb-5">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Description
                    </label>
                    <textarea name="description" v-model="form.description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Desc"></textarea>

                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Store Product</button>
            </form>

        </div>
    </AuthenticatedLayout>
</template>
