<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3';

const { props } = usePage();

const form = useForm({
  text: ''
});

function createComment()
{
  form.post(route('comment.create', props.post));
}
</script>

<template>
  <div class="flex flex-wrap justify-center mt-10">
    <div class="p-4 max-w-sm">
      <div class="flex rounded-lg h-full dark:bg-gray-800 bg-teal-400 p-8 flex-col">
          <Link :href="route('post.update.renderPage', $page.props.post)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Редактировать пост
          </Link> <br>
          <template v-if="$page.props.user">
            <Link v-if="$page.props.user.id == $page.props.post.user.id" :href="route('post.destroy', $page.props.post)" method="delete"
              class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              Удалить пост
            </Link>
          </template>

        <div class="flex items-center mb-3">
          <h2 class="text-white dark:text-white text-lg font-medium">
            Категория: {{ $page.props.post.category.title }} <br>
            {{ $page.props.post.title }}
          </h2>
        </div>
        <div class="flex flex-col justify-between flex-grow">
          <p class="leading-relaxed text-base text-white dark:text-gray-300">
            {{ $page.props.post.text }}
          </p>
        </div>
      </div>
    </div>
  </div>

  <template v-if="$page.props.user">
    <form @submit.prevent="createComment" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2">
          Текст
        </label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          placeholder="Введите текст"
          v-model="form.text"
          type="text"
          required></textarea>
        <p v-if="form.errors.text" class="text-red-500 text-xs italic">{{ form.errors.text }}</p>
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Добавить комментарий
        </button>
      </div>
    </form>
  </template>

  <template v-for="comment in $page.props.comments" :key="comment.id">
    <div class="max-w-lg mx-auto border px-6 py-4 rounded-lg">
      <div>
        <div class="text-lg font-medium text-gray-800">{{ comment.user.name }}</div>
      </div>

      <p class="text-lg leading-relaxed mb-6">{{ comment.text }}</p>

      <template v-if="$page.props.user">
        <Link :href="route('comment.update.renderPage', comment)"
          class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Изменить комментарий
        </Link> <br><br>
        <Link :href="route('comment.destroy', comment)" v-if="comment.user.id == $page.props.user.id" method="delete"
          class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Удалить комментарий
        </Link>
      </template>

    </div> <br>
  </template>
</template>
