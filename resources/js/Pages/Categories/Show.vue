<template>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3>{{ category.name }}</h3>
                <p>{{ category.description }}</p>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
</template>

<script>

import TheAdminLayout from "@/Layouts/TheAdminLayout";

export default {
    layout: TheAdminLayout,
    props: {
        category: Object,
    },
    setup({ category }) {
        return { category };
    },
};
</script>
