<template>
    <form @submit.prevent="onSubmit">
        <h3>Login</h3>

        <input-control
            id="email"
            type="email"
            label="Email address"
            placehoder="Your Email address"
            v-model="form.email"
            :error="form.errors.email"
        ></input-control>
        <input-control
            class="mt-3"
            id="password"
            type="password"
            label="Password"
            placehoder="Your Password "
            v-model="form.password"
            :error="form.errors.password"
        ></input-control>

        <button
            type="submit"
            class="btn btn-primary"
            :disabled="form.processing"
        >
            Login
        </button>
    </form>

    <inertia-link
        class="link d-block"
        :href="route('auth.reset-password-link.create')"
        >Forgot password?</inertia-link
    >
    <inertia-link class="link" :href="route('auth.register')"
        >New here? Sign up</inertia-link
    >
</template>

<script>
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
            password: null,
            remember: false,
        });

        const onSubmit = () => {
            form.post(route("auth.login.store"), {
                preserveScroll: true,
                onSuccess: () => form.reset("password"),
            });
        };

        return { form, onSubmit };
    },
};
</script>
.
