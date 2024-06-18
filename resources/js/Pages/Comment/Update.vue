<script setup>
import { useForm, usePage } from '@inertiajs/vue3';

const { props } = usePage();

const form = useForm({
  text: props.comment.text,
});

function update()
{
  form.patch(route('comment.update.handle', props.comment));
}
</script>

<template>
<div class="w-full max-w-xs">
  <form @submit.prevent="update" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2">
        Текст
      </label>
      <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
        placeholder="Введите текст"
        type="text"
        v-model="form.text"
        required></textarea>
      <p v-if="form.errors.text" class="text-red-500 text-xs italic">{{ form.errors.text }}</p>
    </div>
    <div class="flex items-center justify-between">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Обновить комментарий
      </button>
    </div>
  </form>
</div>
</template>
