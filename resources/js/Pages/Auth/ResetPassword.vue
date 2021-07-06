<template>
    <div class="card">
        <div class="card-body">
            <h3>Hello User name</h3>
            <template v-if="showForm">
                <p>Kindly reset your password below!</p>

                <form @submit.prevent="onSubmit">
                    <input
                        class="form-control"
                        :class="{
                            'is-invalid': form.errors.password,
                        }"
                        type="password"
                        v-model="form.password"
                    />
                    <div v-if="form.errors.password" class="invalid-feedback">
                        {{ form.errors.password }}
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="form.processing"
                    >
                        Reset password
                    </button>
                </form>
            </template>
            <div v-else class="alert alert-success" role="alert">
                <h4>Password reset complete!</h4>
                <p>
                    Kindly click on this
                    <inertia-link :href="route('auth.login')"
                        >link</inertia-link
                    >
                    to login into your account
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, toRefs } from "vue";

import { useForm } from "@inertiajs/inertia-vue3";

import Auth from "@/Layouts/Auth";

export default {
    layout: Auth,
    props: {
        user: Object,
    },
    setup(props) {
        const { user } = toRefs(props);

        const form = useForm({
            password: null,
        });

        const showForm = ref(true);

        const onSubmit = () => {
            form.patch(route("auth.reset-password.update", { user: user.id }), {
                preserveScroll: true,
                onSuccess: () => {
                    form.reset("password");
                    showForm.value = false;
                },
            });
        };

        return { form, showForm, onSubmit };
    },
};
</script>
