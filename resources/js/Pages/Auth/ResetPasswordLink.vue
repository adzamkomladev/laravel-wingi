<template>
    <div class="card">
        <div class="card-body">
            <template v-if="showForm">
                <h5>
                    Kindly enter the email address you used for your account on
                    this platform!
                </h5>

                <form @submit.prevent="onSubmit">
                    <input
                        class="form-control"
                        :class="{
                            'is-invalid': form.errors.email,
                        }"
                        type="email"
                        v-model="form.email"
                    />
                    <div v-if="form.errors.email" class="invalid-feedback">
                        {{ form.errors.email }}
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="form.processing"
                    >
                        Send mail!
                    </button>
                </form>
            </template>
            <div v-else class="alert alert-success" role="alert">
                <h4>Password reset link sent to mail!</h4>
                <p>Kindly check your mail</p>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";

import { useForm } from "@inertiajs/inertia-vue3";

import Auth from "@/Layouts/Auth";

export default {
    layout: Auth,
    setup() {
        const form = useForm({
            email: null,
        });

        const showForm = ref(true);

        const onSubmit = () => {
            form.post(route("auth.reset-password-link.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    form.reset("email");
                    showForm.value = false;
                },
            });
        };

        return { form, showForm, onSubmit };
    },
};
</script>
