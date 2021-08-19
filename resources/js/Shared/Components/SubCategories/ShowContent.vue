<template>
    <div class="d-flex flex-column text-center">
        <img
            class="img-thumbnail"
            :src="subCategory.image_url"
            :alt="imageAlt"
        />
        <h4 class="h4">{{ subCategory.name }}</h4>
        <p class="text-muted">{{ subCategory.description }}</p>
        <div>
            <span
                v-if="subCategory.available"
                class="badge rounded-pill bg-success"
            >
                Available
            </span>
            <span v-else class="badge rounded-pill bg-secondary">
                Unavailable
            </span>
        </div>
    </div>
</template>

<script setup>
import { toRefs, computed } from "vue";

const props = defineProps({
    subCategory: Object,
});

const { subCategory } = toRefs(props);

const imageAlt = computed(() => `${subCategory.value.name} image`);
</script>
