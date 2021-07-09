<template>
    <div class="card">
        <div class="card-body">
            <template v-if="showForm">
                <h5>
                    Kindly enter the email address you used for your account on
                    this platform!
                </h5>

                <form @submit.prevent="onSubmit">
                    <input-control
                        id="email"
                        type="email"
                        label="Email address"
                        placehoder="Your Email address"
                        v-model="form.email"
                        :error="form.errors.email"
                    ></input-control>

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
import InputControl from "@/Shared/Form/InputControl";

export default {
    layout: Auth,
    components: {
        InputControl,
    },
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
