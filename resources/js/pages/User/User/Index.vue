<script setup>
import Layout from '@/mycomponents/layouts/Layout.vue';
import { Link } from '@inertiajs/vue3';
import NavUser from '@/components/NavUser.vue';
import AppHeaderLayout from '@/layouts/app/AppHeaderLayout.vue';

</script>

<template>
  <Layout>
    <h1>ユーザー管理ページ</h1>
    <Link as="button" :href="route('profile.edit')" class="button"> 小説一覧画面へ </Link>

    <Link as="button" :href="route('novels.index')" class="button"> 小説一覧画面へ </Link>

    <Link as="button" :href="route('novels.create')" class="button"> 新しい小説を作成 </Link>
  </Layout>
</template>

<style scoped>
.button {
    appearance: auto;
}
</style>
