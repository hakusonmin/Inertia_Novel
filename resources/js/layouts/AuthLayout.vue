<script setup lang="ts">
import AuthLayout from '@/layouts/auth/AuthSimpleLayout.vue';
import Layout from '@/mycomponents/layouts/Layout.vue';

defineProps<{
  title?: string;
  description?: string;
}>();
</script>

<template>
  <Layout>
    <AuthLayout :title="title" :description="description">
      <slot />
    </AuthLayout>
  </Layout>
</template>
