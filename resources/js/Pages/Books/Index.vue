<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    books: Array,
});

const deleteBook = (id) => {
    if (confirm('Are you sure you want to delete this book?')) {
        router.delete(`/books/${id}`);
    }
};
</script>

<template>

    <Head title="Books" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Book
            </h2>
        </template>

        <div class="py-6">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="container mx-auto">
                            <div class="flex justify-between items-center mb-4">
                                <h1 class="text-2xl font-bold">Books List</h1>
                                <Link :href="route('books.create')"
                                    class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-800">
                                Add New Book
                                </Link>
                            </div>
                            <table class="table-auto w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-300 px-4 py-2 text-left">Image</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Author</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Year</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="book in books" :key="book.id" class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">
                                            <img v-if="book.image" :src="`/storage/${book.image}`" alt="Book Image" class="w-20 h-20 rounded-md object-cover">
                                            <img v-else :src="`https://dummyimage.com/200x200/d9d9d9/000000`" alt="Book Image" class="w-20 h-20 rounded-md object-cover">
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ book.title }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ book.author }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ book.published_year }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <Link :href="route('books.edit', book.id)"
                                                class="text-blue-500 hover:underline">
                                            Edit
                                            </Link>
                                            <form @submit.prevent="deleteBook(book.id)" class="inline-block ml-2">
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button type="submit" class="text-red-500 hover:underline">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
