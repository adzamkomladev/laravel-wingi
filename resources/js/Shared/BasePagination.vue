<template>
    <nav>
        <ul class="pagination justify-content-center">
            <template v-for="(link, key) in links" :key="key">
                <li v-if="link.url === null" class="page-item disabled">
                    <div
                        v-html="link.label"
                        class="page-link"
                        tabindex="-1"
                        aria-disabled="true"
                    ></div>
                </li>
                <li v-else class="page-item" :class="{ active: link.active }">
                    <inertia-link
                        v-html="link.label"
                        class="page-link"
                        :href="link.url"
                    ></inertia-link>
                </li>
            </template>
        </ul>
    </nav>
</template>

<script>
export default {
    props: {
        links: Array,
    },
};
</script>
