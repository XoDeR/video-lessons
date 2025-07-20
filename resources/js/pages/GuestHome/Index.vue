<script setup lang="ts">
import LessonCard from '@/components/LessonCard.vue';
import LessonLayout from '@/layouts/LessonLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';


const props = defineProps<{
  lessons: {
    data: any[]
    current_page: number
    last_page: number
    next_page_url: string | null
  }
}>();

const lessons = ref([...props.lessons.data])

console.log(props);
</script>

<template>

  <Head title="Lessons" />

  <div>Lessons</div>
  <LessonLayout>
    <template #title>Lessons</template>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
      <Link v-for="lesson in lessons" :key="lesson.id" :href="route('lesson.show', lesson.id)" class="block">
      <LessonCard :lesson="lesson" />
      </Link>
    </div>

  </LessonLayout>
</template>