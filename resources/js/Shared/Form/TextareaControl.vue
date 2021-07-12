<template>
    <div class="form-floating" :class="attrs.class">
        <textarea
            ref="input"
            :id="id"
            v-bind="{ ...attrs, class: null }"
            class="form-control"
            :class="{ 'is-invalid': error }"
            :placeholder="placeholder"
            :value="modelValue"
            @input="emit('update:modelValue', $event.target.value)"
            style="height: 100px"
        ></textarea>
        <label v-if="label" :for="id">{{ label }}</label>
        <div v-if="error" class="form-error">{{ error }}</div>
    </div>
</template>

<script>
import { ref } from "vue";

export default {
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default: () => `textarea-${Math.random() * 1000}`,
        },
        placeholder: {
            type: String,
            default: "Enter your value",
        },
        modelValue: String,
        label: String,
        error: String,
    },
    setup(_, { attrs, emit }) {
        const input = ref(null);

        const focus = () => input.value.focus();
        const select = () => input.value.select();

        return { attrs, emit, input, focus, select };
    },
};
</script>
