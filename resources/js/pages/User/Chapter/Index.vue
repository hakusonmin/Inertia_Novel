<script setup>
import BackButton from '@/mycomponents/components/Buttons/BackButton.vue';
import ListLayout from '@/mycomponents/layouts/ListLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { defineProps, onMounted } from 'vue';

const props = defineProps({
  chapters: Array,
});

onMounted(() => {
  //JSON.stringifyを使うと展開出来て便利
  console.log(JSON.stringify(props.chapters));
});

const handleDelete = (id) => {
  router.delete(route('user.chapters.destroy', { chapter: id }), {
    onBefore: () => confirm('本当に削除しますか？'),
  });
};
</script>

<template>
  <ListLayout title="小説一覧">
    <template #default>
      <div class="g-card-container">
        <div class="card" v-for="chapter in chapters" :key="chapter.id">
          <Link :href="route('user.articles.index', { chapter: chapter.id })" as="a">
            <img class="image" src="/images/Thumbnail.png" />
            <div class="card-title">{{ chapter.title }}</div>
          </Link>
          <div class="g-mutation-link-wrapper">
            <Link :href="route('user.chapters.edit', { novel: chapter.novel.id, chapter: chapter.id })" class="mutation-link">編集</Link>
            <button type="button" class="mutation-link" @click="handleDelete(chapter.id)">削除</button>
          </div>
        </div>
      </div>
      <Link as="button" class="g-button" :href="route('user.chapters.create',{ novel: chapters[0].novel.id, })">新規小説作成</Link>
      <BackButton />
    </template>
  </ListLayout>
</template>
