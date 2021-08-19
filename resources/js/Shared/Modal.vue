<template>
    <div
        :id="id"
        class="modal fade"
        :class="direction"
        tabindex="-1"
        :aria-labelledby="idLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" :id="idLabel">
                        <slot name="title"></slot>
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <slot name="body"></slot>
                </div>
                <div class="modal-footer">
                    <slot name="footer"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, defineProps, toRefs } from "vue";

const props = defineProps({
    id: String,
    direction: String,
});

const { id, direction } = toRefs(props);

const idLabel = computed(() => `${id.value}Label`);
</script>
