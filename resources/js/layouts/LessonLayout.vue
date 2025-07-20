<script setup lang="ts">
import LessonFooter from './Lesson/LessonFooter.vue';
import LessonHeader from './Lesson/LessonHeader.vue';

</script>
<template>
  <div class="min-h-screen flex flex-col bg-[#FDFDFC] text-[#1b1b18] dark:bg-[#0a0a0a] dark:text-[#EDEDEC]">
    <LessonHeader>
      <template #title>
        <slot name="title" />
      </template>
    </LessonHeader>

    <main class="mx-auto w-full max-w-6xl px-6 py-8 flex-1 my-20">
      <slot />
    </main>

    <LessonFooter />
  </div>
</template>