<template>
    <div class="">
      <h2 class="text-xl font-semibold text-gray-800">{{ title }}</h2>
    </div>
  </template>

  <script setup>
  import { defineProps } from 'vue';

  const props = defineProps({
    title: {
      type: String,
    }
  });
  </script>

  <style scoped>
  </style>
