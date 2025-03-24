<script setup>
import BackButton from '@/mycomponents/components/Buttons/BackButton.vue';
import InputField from '@/mycomponents/components/Forms/InputField.vue';
import Title from '@/mycomponents/components/Styles/HeaderTitle.vue';
import FormLayout from '@/mycomponents/layouts/FormLayout.vue';
import { useForm } from '@inertiajs/vue3';

// useForm でフォームデータを管理する
const form = useForm({
  title: '',
});

// 送信処理
const submit = () => {
  form.post(route('user.novels.store'));
};
</script>

<template>
  <FormLayout title="小説一覧">
    <form @submit.prevent="submit">
      <InputField label="小説名" v-model="form.title" />
      <button class="g-button" type="submit">作成</button>
      <BackButton />
    </form>
  </FormLayout>
</template>

<style scoped>
</style>
