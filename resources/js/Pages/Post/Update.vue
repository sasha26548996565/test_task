<script setup>
import { useForm, usePage } from '@inertiajs/vue3';

const { props } = usePage();

const form = useForm({
  category_id: props.post.category.id,
  title: props.post.title,
  text: props.post.text,
});

function update()
{
  form.patch(route('post.update.handle', props.post));
}
</script>

<template>
<div class="w-full max-w-xs">
  <form @submit.prevent="update" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">
        Категории
      </label>
      <select v-model="form.category_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <template v-for="category in $page.props.categories" :key="category.id">
          <option :value="category.id">{{ category.title }}</option>
        </template>
      </select>
      <p v-if="form.errors.category_id" class="text-red-500 text-xs italic">{{ form.errors.category_id }}</p>
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2">
        Заголовок
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
        placeholder="Введите заголовок"
        v-model="form.title"
        type="text"
        required />
      <p v-if="form.errors.title" class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
    </div>
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
        Обновить пост
      </button>
    </div>
  </form>
</div>
</template>
