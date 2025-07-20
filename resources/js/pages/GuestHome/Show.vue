<script setup lang="ts">
import VideoPlayer from '@/components/VideoPlayer.vue';
import LessonLayout from '@/layouts/LessonLayout.vue';

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

</script>

<template>
  <div>Lesson</div>
  <LessonLayout>
    <div class="max-w-4xl mx-auto w-full">
      <VideoPlayer :lesson="lesson.id" :src="lesson.video_url" :title="lesson.title" :description="lesson.description"
        :popup-type="lesson.popup_type" :quiz-id="lesson.quiz_id" :quiz="lesson.quiz" :logo-url="lesson.logo_url"
        :progress-color="lesson.control_color" />
    </div>
  </LessonLayout>
</template>