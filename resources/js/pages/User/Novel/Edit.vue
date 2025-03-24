<template>
  <FormLayout title="小説編集">
    <form @submit.prevent="submit">
      <InputField label="小説名" v-model="form.title" />
      <button class="g-button" type="submit">更新</button>
      <BackButton />
    </form>
  </FormLayout>
</template>

<style scoped>
</style>

<script setup>
import BackButton from '@/mycomponents/components/Buttons/BackButton.vue';
import InputField from '@/mycomponents/components/Forms/InputField.vue';
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
