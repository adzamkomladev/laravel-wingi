<template>
    <div class="container">
        <form @submit.prevent="onSubmit">
            <h3>Edit category</h3>
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
            <div class="row mt-3">
                <div class="col-md-8">
                    <file-input-control
                        type="file"
                        accept="image/*"
                        v-model="form.image"
                        :error="form.errors.image"
                        label="Image"
                    ></file-input-control>
                </div>
                <div class="col-md-4">
                    <img :src="imageUrl" class="img-fluid" />
                </div>
            </div>
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
                Update
            </button>
        </form>
    </div>
</template>

<script>
import { ref } from "vue";

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
    props: {
        category: Object,
    },
    setup(props) {
        const imageUrl = ref(props.category.image_url);

        const form = useForm({
            name: props.category.name,
            description: props.category.description,
            image: null,
            show: props.category.show,
            available: props.category.show,
        });

        const onSubmit = () => {
            form.post(
                route("admin.categories.update", {
                    category: props.category,
                }),
                {
                    preserveScroll: true,
                    onSuccess: () => form.reset(),
                }
            );
        };

        return { form, imageUrl, onSubmit };
    },
};
</script>
