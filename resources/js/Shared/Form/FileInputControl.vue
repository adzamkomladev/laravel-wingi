<template>
    <div>
        <label v-if="label" class="form-label">{{ label }}:</label>
        <div class="form-control p-0" :class="{ 'is-invalid': error }">
            <input
                ref="file"
                type="file"
                :accept="accept"
                class="d-none"
                @change="change"
            />
            <div v-if="!modelValue" class="p-2">
                <button type="button" class="btn btn-info" @click="browse">
                    Browse
                </button>
            </div>
            <div
                v-else
                class="d-flex align-items-center justify-content-between p-2"
            >
                <div class="order-1 pr-1">
                    {{ modelValue.name }}
                    <span class="fw-bol fs-6"
                        >({{ filesize(modelValue.size) }})</span
                    >
                </div>
                <button type="button" class="btn btn-secondary" @click="remove">
                    Remove
                </button>
            </div>
        </div>
        <div v-if="error" class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
import { ref, watch } from "vue";

export default {
    props: {
        modelValue: File,
        label: String,
        accept: String,
        error: String,
    },
    setup(props, { attrs, emit }) {
        const file = ref(null);

        const filesize = (size) => {
            var i = Math.floor(Math.log(size) / Math.log(1024));
            return (
                (size / Math.pow(1024, i)).toFixed(2) * 1 +
                " " +
                ["B", "kB", "MB", "GB", "TB"][i]
            );
        };
        const browse = () => file.value.click();
        const change = (e) => emit("update:modelValue", e.target.files[0]);
        const remove = () => emit("update:modelValue", null);

        watch(
            () =>
                new File([props.modelValue], props.modelValue?.name, {
                    type: props.modelValue?.type,
                }),
            (modelValue, prevModelValue) => {
                if (!modelValue) {
                    file.value = "";
                }
            }
        );

        return { attrs, emit, file, filesize, browse, change, remove };
    },
};
</script>
