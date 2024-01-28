<script setup>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from "@/Components/Pagination.vue";
import { Head, Link, router } from '@inertiajs/vue3';
import { watch } from 'vue';

defineProps({data:Object})
let filter = ref('');
watch(filter, (value) => {
  router.get(
    "/transaction",
    { filter: value },
    {
      preserveState: true,
    }
  );
});

</script>

<template>
    <Head title="Transaction" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex gap-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Transaction</h2>
                <div>
                    <input type="search" v-model="filter" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="filter">
                </div>
            </div>
        </template>

        <div class="p-8">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Referensi Code
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quatity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Payment Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in data.data" :key="item.id">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ item.reference_no }}
                            </th>
                            <td  scope="row" class="px-6 py-4">
                                {{ item.product.name }}
                            </td>
                            <td  scope="row" class="px-6 py-4">
                                {{ item.product.price }}
                            </td>
                            <td  scope="row" class="px-6 py-4">
                                {{ item.quantity }}
                            </td>
                            <td  scope="row" class="px-6 py-4">
                                {{ item.payment_amount }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
