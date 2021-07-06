<template>
    <div>
        <form>
            <h3>Register</h3>
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    class="form-control"
                    :class="{
                        'is-invalid': form.errors.name,
                    }"
                    v-model="form.name"
                    id="name"
                    placeholder="Enter your name"
                />
                <div v-if="form.errors.name" class="invalid-feedback">
                    {{ form.errors.name }}
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input
                    type="tel"
                    class="form-control"
                    :class="{
                        'is-invalid': form.errors.phone,
                    }"
                    v-model="form.phone"
                    id="phone"
                    placeholder="Enter your phone number"
                />
                <div v-if="form.errors.phone" class="invalid-feedback">
                    {{ form.errors.phone }}
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input
                    type="email"
                    class="form-control"
                    v-model="form.email"
                    :class="{
                        'is-invalid': form.errors.email,
                    }"
                    id="email"
                    placeholder="Enter your Email address"
                />
                <div v-if="form.errors.email" class="invalid-feedback">
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
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

export default {
    layout: Auth,
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
