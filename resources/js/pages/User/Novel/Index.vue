<script setup>
import Layout from '@/mycomponents/layouts/Layout.vue';
import { defineProps } from 'vue';

defineProps({
  novels: Array,
});
</script>

<template>
  <Layout>
    <div>
      <h1>小説一覧</h1>
      <ul class="m-10 flex">
        <li v-for="novel in novels" :key="novel.id">
          <h2 class="m-2">{{ novel.title }}</h2>
          <ul>
            <li v-for="chapter in novel.chapters" :key="chapter.id">
              <h3>{{ chapter.title }}</h3>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </Layout>
</template>
