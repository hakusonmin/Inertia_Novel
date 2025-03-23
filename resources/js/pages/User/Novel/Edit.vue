<script setup>
import BackButton from '@/mycomponents/components/Buttons/BackButton.vue';
import SubmitButton from '@/mycomponents/components/Buttons/SubmitButton.vue';
import InputField from '@/mycomponents/components/Forms/InputField.vue';
import Title from '@/mycomponents/components/Styles/Title.vue';
import FormLayout from '@/mycomponents/layouts/FormLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

// フォームデータの取得（既存のデータを編集する）
const { props } = usePage();

// 既存データをセット
const form = useForm({
  title: props.novel.title ?? '',
});

const submit = () => {
  form.put(route('user.novels.update', props.novel.id));
};
</script>

<template>
  <FormLayout>
    <Title title="小説編集" />
    <form @submit.prevent="submit">
      <InputField label="小説名" v-model="form.title" />
      <SubmitButton label="更新" />
      <BackButton />
    </form>
  </FormLayout>
</template>

<style scoped>
</style>
