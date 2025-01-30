<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const errors = computed(() => usePage().props.errors || {});

const form = useForm({
    title: '',
    author: '',
    published_year: '',
    description: '',
    image: null,
});

const submit = () => {
    form.post('/books', form);
};
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Add New Book
            </h2>
        </template>

        <div class="py-6">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit" class="space-y-4">
                            <div>
                                <label for="title" class="block font-medium">Title</label>
                                <input v-model="form.title" type="text" id="title"
                                    class="w-full border border-gray-300 rounded px-4 py-2"
                                    :class="{ 'border-red-500': errors.title }" placeholder="Enter book title" />
                                <p v-if="errors.title" class="text-red-500 text-sm mt-1">{{ errors.title }}</p>
                            </div>
                            <div>
                                <label for="author" class="block font-medium">Author</label>
                                <input v-model="form.author" type="text" id="author"
                                    class="w-full border border-gray-300 rounded px-4 py-2"
                                    :class="{ 'border-red-500': errors.author }" placeholder="Enter author name" />
                                <p v-if="errors.author" class="text-red-500 text-sm mt-1">{{ errors.author }}</p>
                            </div>
                            <div>
                                <label for="year" class="block font-medium">Published Year</label>
                                <input v-model="form.published_year" type="number" id="year"
                                    class="w-full border border-gray-300 rounded px-4 py-2"
                                    :class="{ 'border-red-500': errors.published_year }"
                                    placeholder="Enter published year" />
                                <p v-if="errors.published_year" class="text-red-500 text-sm mt-1">{{
                                    errors.published_year }}
                                </p>
                            </div>
                            <div>
                                <label for="description" class="block font-medium">Description</label>
                                <textarea v-model="form.description" id="description"
                                    class="w-full border border-gray-300 rounded px-4 py-2"
                                    :class="{ 'border-red-500': errors.description }"
                                    placeholder="Enter description"></textarea>
                                <p v-if="errors.description" class="text-red-500 text-sm mt-1">{{ errors.description }}
                                </p>
                            </div>
                            <div>
                                <label for="image" class="block font-medium">Image</label>
                                <input @input="form.image = $event.target.files[0]" type="file" id="image"
                                    class="w-full border border-gray-300 rounded px-4 py-2"
                                    :class="{ 'border-red-500': errors.image }" />
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                                </progress>    
                                <p v-if="errors.image" class="text-red-500 text-sm mt-1">{{
                                    errors.image }}
                                </p>
                            </div>
                            <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-800">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
