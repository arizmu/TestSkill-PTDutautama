<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from "@/Components/Pagination.vue";
import { Head, Link, router } from '@inertiajs/vue3';
import { watch } from 'vue';

const props = defineProps({
    data: {
        type: Object,
        default: () => ({}),
    },
});

let search = "";
watch(search, (value) => {
    Inertia.get(
       route(route().current()),
        { search: value },
        {
            preserveState: true,
        }
    );
});
</script>

<template>
    <Head title="Product" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex gap-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product</h2>

                <Link :href="route('product.create')"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Tambah
                Product</Link>
                <div>
                    <input type="text" v-model="search" name="name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="product name" required>
                </div>
            </div>
        </template>

        <div class="p-8">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in data.data" :key="item.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ item.name }}
                            </th>
                            <td scope="row" class="px-6 py-4">
                                {{ item.price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ item.stock }}
                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <Pagination :data="data" />
        </div>
    </AuthenticatedLayout>
</template>
