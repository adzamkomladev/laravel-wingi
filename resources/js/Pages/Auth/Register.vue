<template>
    <div>
        <form>
            <h3>Register</h3>
            <input-control
                id="name"
                class="mt-3"
                type="text"
                label="Name"
                placehoder="Your Name"
                v-model="form.name"
                :error="form.errors.name"
            ></input-control>
            <input-control
                id="phone"
                class="mt-3"
                type="tel"
                label="Phone Number"
                placehoder="Your Phone Number"
                v-model="form.phone"
                :error="form.errors.phone"
            ></input-control>
            <input-control
                id="email"
                class="mt-3"
                type="email"
                label="Email address"
                placehoder="Your Email address"
                v-model="form.email"
                :error="form.errors.email"
            ></input-control>
            <input-control
                id="password"
                class="mt-3"
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
                Register
            </button>
        </form>
        <inertia-link class="link" :href="route('auth.login')"
            >Login instead?</inertia-link
        >
    </div>
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
            name: null,
            phone: null,
            email: null,
            password: null,
        });

        const onSubmit = () => {
            form.post(route("auth.register.store"), {
                preserveScroll: true,
                onSuccess: () => form.reset("password"),
            });
        };

        return { form, onSubmit };
    },
};
</script>
