<template>
    <button :class="computedClass" type="submit">
      {{ label }}
    </button>
  </template>

  <script setup>
  import { computed } from 'vue';

  const props = defineProps({
    label: {
      type: String,
      default: '送信'  // デフォルト値として「送信」
    },
    class: {
      type: String,
      default: 'move-button'
    }
  });

  const computedClass = computed(() => props.class);
  </script>

  <style scoped>
  .move-button {
    padding: 8px 16px;
    margin: 10px;
    background-color: var(--black);
    color: white;
    border: none;
  }
  </style>
