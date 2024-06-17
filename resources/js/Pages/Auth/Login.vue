<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
});

function login()
{
    form.post(route('login.handle'));
}
</script>

<template>
<div class="w-full max-w-xs">
  <form @submit.prevent="login" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Почта
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="username"
        placeholder="Email"
        v-model="form.email"
        type="email"
        required />
      <p v-if="form.errors.email" class="text-red-500 text-xs italic">{{ form.errors.email }}</p>
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Пароль
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
        id="password"
        placeholder="Введите пароль"
        v-model="form.password"
        type="password"
        required />
      <p v-if="form.errors.password" class="text-red-500 text-xs italic">{{ form.errors.password }}</p>
    </div>
    <div class="flex items-center justify-between">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Sign In
      </button>
    </div>
  </form>
</div>

</template>
