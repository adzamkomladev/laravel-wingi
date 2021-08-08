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
                    <Link
                        v-html="link.label"
                        class="page-link"
                        :href="link.url"
                        :only="[valueName]"
                    ></Link>
                </li>
            </template>
        </ul>
    </nav>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: { Link },
    props: {
        links: Array,
        valueName: String,
    },
};
</script>
