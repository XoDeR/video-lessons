<script setup lang="ts">
interface Lesson {
  id: number;
  title: string;
  description: string;
  thumbnail_url: string;
};

defineProps<{
  lesson: Lesson
}>();
</script>

<template>
  <div
    class="flex flex-col bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden h-full">
    <img :src="lesson.thumbnail_url" :alt="lesson.title" class="w-full h-48 object-cover" />
    <div class="p-4 flex flex-col flex-grow">
      <h3 class="text-base font-semibold text-gray-800 line-clamp-1">
        {{ lesson.title }}
      </h3>
      <p class="text-sm text-gray-500 mt-1 line-clamp-2">
        {{ lesson.description }}
      </p>
    </div>
  </div>
</template>
