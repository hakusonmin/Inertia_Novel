<script setup>

import { Link } from '@inertiajs/vue3';
import { useAttrs } from 'vue';

const attrs = useAttrs();
const moveButtonClass = 'move-button';
</script>

<template>
  <Link as="button" :class="moveButtonClass" v-bind="attrs">
    <slot />
  </Link>
</template>

<style scoped>
.move-button {
  margin: 10px;
  appearance: none;
  padding: 8px 16px;
  font-weight: 150;
  color: var(--white);
  background-color: var(--black);
}
</style>
