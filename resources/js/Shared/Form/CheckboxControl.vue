<template>
    <div class="form-check" :class="attrs.class">
        <input
            :id="id"
            ref="input"
            v-bind="{ ...attrs, class: null }"
            class="form-check-input"
            :class="{ 'is-invalid': error }"
            type="checkbox"
            :value="modelValue"
            @input="emit('update:modelValue', !!$event.target.value)"
        />
        <label v-if="label" class="form-check-label" :for="id">{{
            label
        }}</label>
        <div v-if="error" class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
import { ref } from "vue";

export default {
    props: {
        id: {
            type: String,
            default: () => `checkbox-${Date.now}`,
        },
        error: String,
        modelValue: String,
        label: String,
    },
    setup(_, { attrs, emit }) {
        const input = ref(null);

        const focus = () => input.value.focus();
        const select = () => input.value.select();

        return { attrs, emit, input, focus, select };
    },
};
</script>
