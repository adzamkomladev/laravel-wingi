<template>
    <div class="container">
        <div class="my-5 d-flex justify-content-between">
            <div class="form-group">
                <input
                    @keyup="onSearch"
                    v-model="search"
                    type="text"
                    class="form-control"
                    placeholder="Search..."
                />
            </div>
            <Link
                type="button"
                class="btn btn-primary"
                :href="route('admin.brands.create')"
            >
                Create
            </Link>
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
                <tr v-for="(brand, index) in brands.data" :key="index">
                    <th scope="row" colspan="2">
                        <div>
                            {{ brand?.name }}
                        </div>
                    </th>
                    <td>{{ brand?.description }}</td>
                    <td>{{ brand?.available }}</td>
                    <td>
                        <Link
                            :href="
                                route('admin.brands.show', {
                                    brand,
                                })
                            "
                            type="button"
                            class="btn btn-primary"
                        >
                            View
                        </Link>
                        <Link
                            :href="
                                route('admin.brands.edit', {
                                    brand,
                                })
                            "
                            type="button"
                            class="btn btn-secondary"
                        >
                            Edit
                        </Link>
                        <!-- <button type="button" class="btn btn-primary">
                            Delete brand
                        </button> -->
                    </td>
                </tr>
            </tbody>
        </table>
        <base-pagination
            :links="brands.links"
            value-name="brands"
        ></base-pagination>
    </div>
</template>
<script>
import { ref } from "vue";

import throttle from "lodash/throttle";

import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

import TheAdminLayout from "@/Layouts/TheAdminLayout";
import BasePagination from "@/Shared/BasePagination";

export default {
    layout: TheAdminLayout,
    components: { Link, BasePagination },
    props: {
        brands: Object,
        search: String,
    },
    setup(props) {
        const search = ref(props.search ?? "");

        const onSearch = throttle(() => {
            Inertia.get(
                route("admin.brands.index", { search: search.value }),
                {},
                { replace: true, preserveState: true }
            );
        }, 200);

        return { search, onSearch };
    },
};
</script>
