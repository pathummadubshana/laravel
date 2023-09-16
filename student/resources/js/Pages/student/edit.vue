<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    blog: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.blog.id,
    title: props.blog.title,
    slug: props.blog.slug,
    content: props.blog.content,
});


const submit = () => {
    form.put(route("students.update", props.blog.id));
};
</script>

<template>
    <Head title="Students Edit" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                students Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="Name"
                                    class="student mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.name"
                                    name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="image"
                                    class="student mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >image</label
                                >
                                <input
                                    type="image"
                                    v-model="form.name"
                                    name="image"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.image"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.image }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="age"
                                    class="student mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Age</label
                                >
                                <input
                                    type="text"
                                    v-model="form.age"
                                    name="age"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.age"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.age }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="status"
                                    class="student mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >status</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.status"
                                    name="statust"
                                    id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.status"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.status }}
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>