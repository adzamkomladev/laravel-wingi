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
            @input="emit('update:modelValue', $event.target.value)"
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
            default: () => `input-${Math.random() * 1000}`,
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
    setup(_, { attrs, emit }) {
        const input = ref(null);

        const focus = () => input.value.focus();
        const select = () => input.value.select();
        const setSelectionRange = (start, end) =>
            input.value.setSelectionRange(start, end);

        return { attrs, emit, input, focus, select, setSelectionRange };
    },
};
</script>
