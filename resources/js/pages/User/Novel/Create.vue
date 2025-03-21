<script setup>
import Layout from '@/mycomponents/layouts/Layout.vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = ref({
  title: '',
});

const submit = () => {
  router.post('/novels', form.value);
};
</script>

<template>
  <Layout>
    <div>
      <h1>小説作成</h1>
      <form @submit.prevent="submit">
        <input v-model="form.title" placeholder="小説タイトル" />
        <br />
        <button type="submit">作成</button>
      </form>
      <button class="back-button" onclick="history.back()">戻る</button>
    </div>
  </Layout>
</template>

<style scoped>
</style>
