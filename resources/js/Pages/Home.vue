<script setup>
import { Link, useForm } from '@inertiajs/vue3';

import { route } from 'ziggy-js';

const form = useForm({
  category_id: '',
  user_id: ''
});

function filter()
{
  form.get(route('home'), {
    preserveState: true
  });
}
</script>

<template>
  <form @submit.prevent="filter" class="max-w-sm mx-auto">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Выберите категорию</label>

    <select v-model="form.category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <template v-for="category in $page.props.categories" :key="category.id">
        <option :value="category.id">{{ category.title }}</option>
      </template>
    </select>

    <div v-if="$page.props.user" class="flex items-center mb-4">
      <input v-model="form.user_id" :true-value="$page.props.user.id" :false-value="''" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
      <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Мои посты</label>
    </div>

    <div class="flex items-center justify-between">
      <button
        type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
      >
        Применить
      </button>

      <Link :href="route('home')"
        class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
      >
        Сбросить
      </Link>
    </div>
  </form>

  <div class="flex flex-wrap justify-center mt-10">
    <div v-for="post in $page.props.posts" :key="post.id" class="p-4 max-w-sm">
      <div class="flex rounded-lg h-full dark:bg-gray-800 bg-teal-400 p-8 flex-col">
        <div class="flex items-center mb-3">
          <h2 class="text-white dark:text-white text-lg font-medium">
            Категория: {{ post.category.title }} <br>
            {{ post.title }}
          </h2>
        </div>
        <div class="flex flex-col justify-between flex-grow">
          <p class="leading-relaxed text-base text-white dark:text-gray-300">
            {{ post.text }}
          </p>
          <Link class="mt-3 text-black dark:text-white hover:text-blue-600 inline-flex items-center"
            :href="route('post.show', post)">
            Подробнее
            <svg class="w-4 h-4 ml-2"
                 fill="none"
                 stroke="currentColor"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 stroke-width="2"
                 viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7" />
            </svg>
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>
