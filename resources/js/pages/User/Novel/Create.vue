<script setup>
import Layout from '@/mycomponents/layouts/Layout.vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = ref({
  title: null,
});

//↓これ form.value の value 書かないとエラーになります..
const submit = () => {
  router.post(route('user.novels.store', form.value));
};
</script>

<template>
  <Layout>
    <section class="content">
      <section class="my-wrapper">
        <div class="wrapper">
          <h1 class="wrapper-title">小説作成</h1>
          <form @submit.prevent="submit">
            <div class="form-element-wrapper">
              <div class="form-element-wrapper-title"><label for="title">小説名</label></div>
              <div class="form-element-wrapper-content"><input id="title" name="title" v-model="form.title" required /></div>
            </div>
            <button class="move-button" type="submit">作成</button>
            <button class="move-button" onclick="history.back()">戻る</button>
          </form>
        </div>
      </section>
    </section>
  </Layout>
</template>

<style>
:root {
  --black: rgb(67, 67, 67);
  --light-gray: rgb(233, 229, 222);
  --white: rgb(255, 255, 255);
  --font-black: rgb(87, 87, 87);
}
</style>

<style scoped>
body {
  background-color: var(--black);
  margin: 0; /*超大事*/
}

.content {
  background-color: var(--light-gray);
  padding: 20px; /*このパディングないとちゃんと動きません*/
}

.wrapper {
  max-width: 450px;
  margin: 3dvw auto 3dvw auto;
  text-align: center;
  padding: 4dvw;
  color: var(--font-black);
}

input[type='text'] {
  appearance: none; /*これを一番上で書かないとダメ*/
  height: 35px;
  background-color: var(--light-gray);
  margin-bottom: 6px;
  border: 0.5px solid black;
}

input[type='checkbox'] {
  background-color: transparent;
  border: 0px solid black;
}

textarea {
  background-color: transparent;
  border: 0px solid black;
  width: 70%;
  height: 20px;
}

.wrapper-title {
  color: var(--font-black);
  font-size: 28px;
  font-weight: 150;
  margin-bottom: 34px;
}

.form-element-wrapper {
  margin-bottom: 40px;
}

.form-element-wrapper-title {
  text-align: left;
}

.form-element-wrapper-content {
  border-bottom: 1px solid rgb(170, 170, 170);
  margin: 20px auto 20px auto;
}

.form-element-wrapper-content-checkbox {
  border-bottom: 1px solid rgb(170, 170, 170);
  width: 10%;
  margin: 0 auto;
}

.jump-button {
  margin: 30px auto 20px auto;
  appearance: none;
  padding: 8px 16px;
  font-weight: 150;
  color: var(--white);
  background-color: var(--black);
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
