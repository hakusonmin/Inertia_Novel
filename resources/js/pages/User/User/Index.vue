<script setup>
import Layout from '@/mycomponents/layouts/Layout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <Layout>
    <div>
      <h1>ユーザー管理ページ</h1>
      <div>
        <Link as="button" :href="route('profile.edit')" class="button"> アカウント情報 </Link>
      </div>
      <div>
        <Link as="button" :href="route('novels.index')" class="button"> 小説一覧画面へ </Link>
      </div>
      <div>
        <Link as="button" :href="route('novels.create')" class="button"> 新しい小説を作成 </Link>
      </div>
    </div>
  </Layout>
</template>

