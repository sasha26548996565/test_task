<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
<header class="header-2">
  <nav class="bg-white py-2 md:py-4">
    <div class="container px-4 mx-auto md:flex md:items-center">
      <div class="flex justify-between items-center">
        <Link class="font-bold text-xl text-indigo-600" :href="route('home')">Блог</Link>
        <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden"
          id="navbar-toggle">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
        <Link :href="route('home')"
          class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">
          Главная
        </Link>

        <template v-if="$page.props.user">
          <Link class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"
            :href="route('post.create.renderPage')">
            Создать пост
          </Link>
          <Link :href="route('logout')" method="delete" class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300"
            >
            Выйти
          </Link>
        </template>
        <template v-else>
          <Link class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300"
          :href="route('login')">
            Войти
          </Link>
          <Link class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-solid border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1"
          :href="route('register.renderPage')">
            Регистрация
          </Link>
        </template>
      </div>
    </div>
  </nav>
</header>
</template>
