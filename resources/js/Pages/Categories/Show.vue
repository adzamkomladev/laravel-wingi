<template>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h4 class="h4">{{ category.name }}</h4>
                <p class="lead">{{ category.description }}</p>
                <img width="240" :src="category.image_url" class="img-fluid" />
            </div>
            <div class="col-md-5">
                <div v-if="isSubCategoriesEmpty">No sub categories yet</div>
                <table v-else class="table caption-top">
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
                            v-for="(
                                subCategory, index
                            ) in category.sub_categories"
                            :key="index"
                        >
                            <td scope="row" colspan="2">
                                <div class="d-flex w-100">
                                    <img
                                        :src="subCategory?.image_url"
                                        class="img-fluid"
                                        :alt="`${subCategory?.name}'s image`"
                                        width="80"
                                    />
                                    <p class="ms-2 fw-bold">
                                        {{ subCategory?.name }}
                                    </p>
                                </div>
                            </td>
                            <td>{{ subCategory?.available }}</td>
                            <td>
                                <button
                                    @click.prevent="onShow(subCategory)"
                                    type="button"
                                    class="btn btn-primary me-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#showModal"
                                >
                                    View
                                </button>
                                <button
                                    @click.prevent="onShow(subCategory)"
                                    type="button"
                                    class="btn btn-primary me-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal"
                                >
                                    Edit
                                </button>
                                <!-- <button type="button" class="btn btn-primary">
                            Delete category
                        </button> -->
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button
                    @click.prevent="onShow(subCategory)"
                    type="button"
                    class="btn btn-secondary d-block"
                    data-bs-toggle="modal"
                    data-bs-target="#showModal"
                >
                    Add new sub category
                </button>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#showModal"
        >
            Launch demo modal
        </button>

        <!-- Modals -->
        <Modal id="showModal" direction="right">
            <template v-slot:title>View sub category</template>
            <template v-slot:body>
                <ShowContent
                    v-if="selectedSubCategory"
                    :sub-category="selectedSubCategory"
                ></ShowContent>
            </template>
            <template v-slot:footer>
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
            </template>
        </Modal>
        <Modal id="editModal" direction="right">
            <template v-slot:title> Create a new sub category </template>
            <template v-slot:body>
                <ShowContent
                    v-if="selectedSubCategory"
                    :sub-category="selectedSubCategory"
                ></ShowContent>
            </template>
            <template v-slot:footer>
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
            </template>
        </Modal>
    </div>
</template>

<script>
import { computed, ref } from "vue";

import { Link } from "@inertiajs/inertia-vue3";

import TheAdminLayout from "@/Layouts/TheAdminLayout";
import Modal from "@/Shared/Modal";
import ShowContent from "@/Shared/Components/SubCategories/ShowContent";

export default {
    layout: TheAdminLayout,
    components: {
        Link,
        Modal,
        ShowContent,
    },
    props: {
        category: Object,
    },
    setup({ category }) {
        const isSubCategoriesEmpty = computed(
            () => category?.sub_categories?.length === 0
        );

        const selectedSubCategory = ref(null);

        const onShow = (subCategory) =>
            (selectedSubCategory.value = subCategory);

        return { category, isSubCategoriesEmpty, selectedSubCategory, onShow };
    },
};
</script>
