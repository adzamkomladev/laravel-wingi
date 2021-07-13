<template>
    <div class="container">
        <form @submit.prevent="onSubmit">
            <h3>Create new category</h3>
            <input-control
                id="name"
                class="mt-3"
                type="text"
                label="Category Name"
                placehoder="Category Name"
                v-model="form.name"
                :error="form.errors.name"
            ></input-control>
            <textarea-control
                id="description"
                class="mt-3"
                label="Description"
                placehoder="Category Description"
                v-model="form.description"
                :error="form.errors.description"
            ></textarea-control>
            <file-input-control
                type="file"
                accept="image/*"
                class="mt-3"
                v-model="form.image"
                :error="form.errors.image"
                label="Image"
            ></file-input-control>
            <checkbox-control
                id="show"
                class="mt-3"
                label="Show on the navbar"
                v-model="form.show"
                :error="form.errors.show"
            ></checkbox-control>
            <checkbox-control
                id="available"
                class="mt-3"
                label="Is Available?"
                v-model="form.available"
                :error="form.errors.available"
            ></checkbox-control>
            <button
                type="submit"
                class="btn btn-primary"
                :disabled="form.processing"
            >
                Create
            </button>
        </form>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";

import TheAdminLayout from "@/Layouts/TheAdminLayout";
import InputControl from "@/Shared/Form/InputControl";
import TextareaControl from "@/Shared/Form/TextareaControl";
import CheckboxControl from "@/Shared/Form/CheckboxControl";
import FileInputControl from "@/Shared/Form/FileInputControl";

export default {
    layout: TheAdminLayout,
    components: {
        InputControl,
        TextareaControl,
        CheckboxControl,
        FileInputControl,
    },
    setup() {
        const form = useForm({
            name: null,
            description: null,
            image: null,
            show: false,
            available: false,
        });

        const onSubmit = () => {
            form.post(route("admin.categories.store"), {
                preserveScroll: true,
                onSuccess: () => form.reset(),
            });
        };

        return { form, onSubmit };
    },
};
</script>
