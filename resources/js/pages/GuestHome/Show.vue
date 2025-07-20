<script setup lang="ts">
import QuizModal from '@/components/QuizModal.vue';
import Button from '@/components/ui/button/Button.vue';
import VideoPlayer from '@/components/VideoPlayer.vue';
import LessonLayout from '@/layouts/LessonLayout.vue';
import { ref } from 'vue';

defineProps<{
  lesson: {
    id: number
    title: string
    description: string
    video_url: string
    logo_url?: string
    control_color?: string
    popup_type?: 'quiz' | 'subscribe'
    quiz_id?: number
    quiz?: {
      id: number
      title: string
      questions: {
        question_text: string
        type: 'text' | 'single' | 'multi'
        options?: string[]
      }[]
    }
    thumbnail_url?: string
    created_at?: string
    updated_at?: string
  },
}>()

const showQuizModal = ref(false);

</script>

<template>

  <Head :title="lesson.title" />
  <LessonLayout>
    <template #title>
      <a :href="route('home')" class="text-lg font-semibold">Back to Lessons</a>
    </template>

    <div class="max-w-4xl mx-auto w-full">
      <VideoPlayer :lesson="lesson.id" :src="lesson.video_url" :title="lesson.title" :description="lesson.description"
        :popup-type="lesson.popup_type" :quiz-id="lesson.quiz_id" :quiz="lesson.quiz" :logo-url="lesson.logo_url"
        :progress-color="lesson.control_color" />
    </div>

    <Button variant="outline" v-if="!showQuizModal" @click="showQuizModal = true">Quiz</Button>

    <QuizModal v-if="showQuizModal" :open="showQuizModal" @close="showQuizModal = false" />

  </LessonLayout>
</template>