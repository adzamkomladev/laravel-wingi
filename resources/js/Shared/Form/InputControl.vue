<template>
    <div class="form-floating" :class="attrs.class">
        <input
            :id="id"
            ref="input"
            v-bind="{ ...attrs, class: null }"
            class="form-control"
            :class="{ 'is-invalid': error }"
            :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :placeholder="placeholder"
        />
        <label v-if="label" :for="id">{{ label }}:</label>
        <div v-if="error" class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
import { ref } from "vue";

export default {
    props: {
        id: {
            type: String,
            default: () => `input-${Date.now}`,
        },
        type: {
            type: String,
            default: "text",
        },
        placeholder: {
            type: String,
            default: "Enter your value here!",
        },
        error: String,
        modelValue: String,
        label: String,
    },
    setup(props, { attrs }) {
        const input = ref(null);

        const focus = () => input.focus();
        const select = () => input.select();
        const setSelectionRange = (start, end) =>
            input.setSelectionRange(start, end);

        return { attrs, input, focus, select, setSelectionRange };
    },
};
</script>
