<template>
    <ListLayout>
      <HeaderTitle title="小説一覧" />
      <CardContainer>
        <Card v-for="chapter in chapters" :key="chapter.id">
          <CardLink :href="route('user.articles.index', { chapter: chapter.id })" as="a">
            <CardImage src="/images/Thumbnail.png"/>
            <CardTitle >{{ chapter.title }}</CardTitle>
          </CardLink>
          <MutateWrapper>
            <EditButton :href="route('user.chapters.edit', { novel: chapter.novel.id, chapter: chapter.id })" as="button">編集</EditButton>
            <MutateButton @click="handleDelete(chapter.id)">削除</MutateButton>
          </MutateWrapper>
        </Card>
      </CardContainer>
      <LinkButton :href="route('user.chapters.create', { novel: chapters[0].novel.id, })" as="button">新規章作成</LinkButton>
      <BackButton />
    </ListLayout>
  </template>

  <script setup>
  import { router } from '@inertiajs/vue3';
  import { defineProps } from 'vue';
  import ListLayout from '@/mycomponents/layouts/ListLayout.vue';
  import BackButton from '@/mycomponents/components/Buttons/BackButton.vue';
  import CardLink from '@/mycomponents/components/Buttons/CardLink.vue';
  import MutateButton from '@/mycomponents/components/Buttons/EditButton.vue';
  import CardContainer from '@/mycomponents/components/Cards/CardContainer.vue';
  import CardImage from '@/mycomponents/components/Cards/CardImage.vue';
  import CardTitle from '@/mycomponents/components/Cards/CardTitle.vue';
  import Card from '@/mycomponents/components/Cards/Card.vue';
  import MutateWrapper from '@/mycomponents/components/Cards/MutateWrapper.vue';
  import HeaderTitle from '@/mycomponents/components/Styles/HeaderTitle.vue';
  import EditButton from '@/mycomponents/components/Buttons/EditButton.vue';
  import LinkButton from '@/mycomponents/components/Buttons/LinkButton.vue';

  const props = defineProps({
    chapters: Array,
  });

  const handleDelete = (id) => {
    router.delete(route('user.chapters.destroy', { chapter: id }), {
      onBefore: () => confirm('本当に削除しますか？'),
    });
  };
  </script>

  <style scoped>
  </style>
