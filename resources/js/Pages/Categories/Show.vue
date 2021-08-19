<template>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3>{{ category.name }}</h3>
                <p>{{ category.description }}</p>
                <img :src="category.image_url" class="img img-fluid" />
            </div>
            <div class="col-md-5">
                <table v-if="isSubCategoriesEmpty" class="table caption-top">
                    <caption>
                        List of Sub Categories
                    </caption>
                    <thead>
                        <tr>
                            <th scope="col" colspan="2">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(subCategory, index) in category.subCategory"
                            :key="index"
                        >
                            <td scope="row" colspan="2">
                                <div
                                    class="d-flex justify-content-between w-100"
                                >
                                    <img
                                        :src="subCategory?.image_url"
                                        class="img-fluid"
                                        :alt="`${subCategory?.name}'s image`"
                                    />
                                    <p>{{ subCategory?.name }}</p>
                                </div>
                            </td>
                            <td>{{ subCategory?.available }}</td>
                            <td>
                                <Link
                                    :href="
                                        route('admin.categories.show', {
                                            category,
                                        })
                                    "
                                    type="button"
                                    class="btn btn-primary"
                                >
                                    View
                                </Link>
                                <Link
                                    :href="
                                        route('admin.categories.edit', {
                                            category,
                                        })
                                    "
                                    type="button"
                                    class="btn btn-secondary"
                                >
                                    Edit
                                </Link>
                                <!-- <button type="button" class="btn btn-primary">
                            Delete category
                        </button> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Link
                    :href="
                        route('admin.categories.edit', {
                            category,
                        })
                    "
                    type="button"
                    class="btn btn-secondary d-block"
                >
                    Add new sub category
                </Link>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
        >
            Launch demo modal
        </button>

        <!-- Modal -->

    </div>
</template>

<script>
import { computed } from "vue";

import { Link } from "@inertiajs/inertia-vue3";

import TheAdminLayout from "@/Layouts/TheAdminLayout";

export default {
    layout: TheAdminLayout,
    components: {
        Link,
    },
    props: {
        category: Object,
    },
    setup({ category }) {
        const isSubCategoriesEmpty = computed(
            () => category?.subCategories?.length === 0
        );

        return { category, isSubCategoriesEmpty };
    },
};
</script>
