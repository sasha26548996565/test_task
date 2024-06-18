<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
});

function register()
{
  form.post(route('register.handle'));
}
</script>

<template>
  <div class="w-full max-w-xs">
    <form @submit.prevent="register" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
          Имя
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="name"
          placeholder="Имя"
          v-model="form.name"
          type="text"
          :class="{ 'border-red-500': form.errors.name }"
          required
        />
        <p v-if="form.errors.name" class="text-red-500 text-xs italic">{{ form.errors.name }}</p>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          Почта
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="email"
          placeholder="Email"
          v-model="form.email"
          type="email"
          :class="{ 'border-red-500': form.errors.email }"
          required
        />
        <p v-if="form.errors.email" class="text-red-500 text-xs italic">{{ form.errors.email }}</p>
      </div>

      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Пароль
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password"
          placeholder="Введите пароль"
          v-model="form.password"
          type="password"
          :class="{ 'border-red-500': form.errors.password }"
          required
        />
        <p v-if="form.errors.password" class="text-red-500 text-xs italic">{{ form.errors.password }}</p>
      </div>

      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
          Подтвердите пароль
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
          id="password_confirmation"
          placeholder="Введите повторно пароль"
          v-model="form.password_confirmation"
          type="password"
          :class="{ 'border-red-500': form.errors.password_confirmation }"
          required
        />
        <p v-if="form.errors.password_confirmation" class="text-red-500 text-xs italic">{{ form.errors.password_confirmation }}</p>
      </div>

      <div class="flex items-center justify-between">
        <button
          type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        >
          Зарегистрироваться
        </button>
      </div>
    </form>
  </div>
</template>
