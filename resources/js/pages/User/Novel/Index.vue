<script setup>
import LinkButton from '@/mycomponents/components/Buttons/LinkButton.vue';
import ListLayout from '@/mycomponents/layouts/ListLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
  novels: Array,
});

const handleDelete = (id) => {
  router.delete(route('user.novels.destroy', { novel: id }), {
    onBefore: () => confirm('本当に削除しますか？'),
  });
};
</script>

<template>
  <ListLayout>
    <h1>小説一覧</h1>
    <div class="card-container">
      <div class="card" v-for="novel in novels" :key="novel.id">
        <Link :href="route('user.chapters.index', { novel: novel.id })" as="a">
          <img class="image" src="/images/Thumbnail.png" />
          <div class="card-title">{{ novel.title }}</div>
        </Link>
        <div class="mutation-link-wrapper">
          <Link :href="route('user.novels.edit', { novel: novel.id })" class="mutation-link">編集</Link>
          <button type="button" class="mutation-link" @click="handleDelete(novel.id)">削除</button>
        </div>
      </div>
    </div>
    <LinkButton href="/user/novels/create">新規小説作成</LinkButton>
    <button class="move-button" onclick="history.back()">戻る</button>
  </ListLayout>
</template>


<style scoped>
.content {
  background-color: var(--light-gray);
  padding: 20px; /*このパディングないとちゃんと動きません*/
}

.wrapper {
  max-width: 960px;
  margin: 3dvw auto 3dvw auto;
  text-align: center;
  padding: 4dvw;
}

.wrapper-title {
  color: var(--font-black);
  font-size: 28px;
  font-weight: 150;
}

.card-container {
  margin-top: 30px;
  display: grid;
  gap: 20px; /*これdvwで指定するとレスデザで上下間が詰まりすぎるからpxにした*/
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  place-items: center; /* これで中央揃えになる */
}

.card {
  margin: 10px;
  max-width: 270px;
  border: 1px solid rgb(130, 130, 130);
  display: grid;
  background-color: var(--white);
  box-shadow: 2px 2px 4px var(--black);
}

/* .cardにある.card-titleに対する操作です(複数に当てる倍は,で区切るよ.) */
.card .card-title {
  font-size: 16px;
  text-align: left;
  color: var(--font-black);
  margin: 2px 30px 2px 14px;
}

.card .image {
  box-sizing: border-box;
  width: 100%;
  aspect-ratio: 5 / 3;
  object-fit: cover;
}

.mutation-link-wrapper {
  text-align: right;
}

.mutation-link {
  display: inline-block;
  color: var(--white);
  background-color: var(--black);
  margin: 0 7px 3px 0px;
  padding: 3px 6px 3px 6px;
  font-weight: 80;
  font-size: 13px;
}

.move-button {
  margin: 20px;
  appearance: none;
  padding: 8px 16px;
  font-weight: 150;
  color: var(--white);
  background-color: var(--black);
}
</style>
