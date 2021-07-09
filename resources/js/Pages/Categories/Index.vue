<template>
    <div class="container">
        <div class="row align-items-end">
            <div class="form-group">
                <input
                    @keyup="onSearch"
                    v-model="search"
                    type="text"
                    class="form-control"
                    placeholder="Search..."
                />
            </div>
            <inertia-link
                type="button"
                class="btn btn-primary"
                :href="route('admin.categories.create')"
            >
                Create
            </inertia-link>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(category, index) in categories.data" :key="index">
                    <th scope="row" colspan="2">
                        <div>
                            {{ category?.name }}
                        </div>
                    </th>
                    <td>{{ category?.description }}</td>
                    <td>{{ category?.available }}</td>
                    <td>
                        <inertia-link
                            :href="
                                route('admin.categories.show', {
                                    category,
                                })
                            "
                            type="button"
                            class="btn btn-primary"
                        >
                            View category
                        </inertia-link>
                        <button type="button" class="btn btn-primary">
                            Delete category
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <base-pagination :links="categories.links"></base-pagination>
    </div>
</template>
<script>
import { ref } from "vue";

import throttle from "lodash/throttle";

import { Inertia } from "@inertiajs/inertia";

import TheAdminLayout from "../../Layouts/TheAdminLayout";
import BasePagination from "../../Shared/BasePagination.vue";

export default {
    layout: TheAdminLayout,
    components: { BasePagination },
    props: {
        categories: Object,
        search: String,
    },
    setup(props) {
        const search = ref(props.search ?? "");

        const onSearch = throttle(() => {
            Inertia.get(
                route("admin.categories.index", { search: search.value }),
                {},
                { replace: true, preserveState: true }
            );
        }, 200);

        return { search, onSearch };
    },
};
</script>
