<template>
  <ListLayout>
    <HeaderTitle title="小説一覧" />
    <CardContainer>
      <Card v-for="novel in novels" :key="novel.id">
        <CardLink :href="route('user.chapters.index', { novel: novel.id })" as="a">
          <CardImage src="/images/Thumbnail.png"/>
          <CardTitle >{{ novel.title }}</CardTitle>
        </CardLink>
        <MutateWrapper>
          <MutateButton :href="route('user.novels.edit', { novel: novel.id })" class="mutation-link">編集</MutateButton>
          <MutateButton @click="handleDelete(novel.id)">削除</MutateButton>
        </MutateWrapper>
      </Card>
    </CardContainer>
    <LinkButton :href="route('user.novels.create')" as="button">新規小説作成</LinkButton>
    <BackButton />
  </ListLayout>
</template>

<script setup>
import ListLayout from '@/mycomponents/layouts/ListLayout.vue';
import { router } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import BackButton from '@/mycomponents/components/Buttons/BackButton.vue';
import CardLink from '@/mycomponents/components/Buttons/CardLink.vue';
import MutateButton from '@/mycomponents/components/Buttons/MutateButton.vue';
import LinkButton from '@/mycomponents/components/Buttons/LinkButton.vue';
import CardContainer from '@/mycomponents/components/Cards/CardContainer.vue';
import CardImage from '@/mycomponents/components/Cards/CardImage.vue';
import CardTitle from '@/mycomponents/components/Cards/CardTitle.vue';
import Card from '@/mycomponents/components/Cards/Card.vue';
import MutateWrapper from '@/mycomponents/components/Cards/MutateWrapper.vue';
import HeaderTitle from '@/mycomponents/components/Styles/HeaderTitle.vue';

const props = defineProps({
  novels: Array,
});

const handleDelete = (id) => {
  router.delete(route('user.novels.destroy', { novel: id }), {
    onBefore: () => confirm('本当に削除しますか？'),
  });
};
</script>

<style scoped></style>
