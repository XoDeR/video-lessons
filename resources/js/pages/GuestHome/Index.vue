<script setup lang="ts">
import LessonLayout from '@/layouts/LessonLayout.vue';


const props = defineProps<{
  lessons: {
    data: any[]
    current_page: number
    last_page: number
    next_page_url: string | null
  }
}>()

console.log(props);
</script>

<template>
  <div>Lessons</div>
  <LessonLayout>
    <div>Lessons</div>
  </LessonLayout>
</template>