<template>
    <form @submit.prevent="onSubmit">
        <h3>Login</h3>
        <div class="form-group">
            <label class="form-label" for="email">Email address</label>
            <input
                type="email"
                class="form-control"
                :class="{
                    'is-invalid': form.errors.email,
                }"
                v-model="form.email"
                id="email"

                placeholder="Enter your Email address"
            />
            <div v-if="form.errors.email" class="invalid-feedback">
                {{ form.errors.email }}
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <input
                type="password"
                class="form-control"
                :class="{
                    'is-invalid': form.errors.password,
                }"
                v-model="form.password"
                id="password"
                placeholder="Your Password"
            />
            <div v-if="form.errors.password" class="invalid-feedback">
                {{ form.errors.password }}
            </div>
        </div>

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

export default {
    layout: Auth,
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
