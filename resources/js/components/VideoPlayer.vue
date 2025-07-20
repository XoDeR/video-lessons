<script setup lang="ts">
import Plyr from 'plyr'
import 'plyr/dist/plyr.css'
import { onMounted, ref } from 'vue';

const props = defineProps<{
  lesson: number
  src: string
  title: string
  description: string
  quizId?: number
  quiz?: {
    id: number
    title: string
    questions: {
      question_text: string
      type: 'text' | 'single' | 'multi'
      options?: string[]
    }[]
  }
  logoUrl?: string
  progressColor?: string
}>()

const videoRef = ref<HTMLVideoElement | null>(null)

onMounted(() => {
  const player = new Plyr(videoRef.value!, {
    controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
  })

  if (props.progressColor) {
    document.documentElement.style.setProperty('--plyr-color-main', props.progressColor)
  }
})
</script>

<template>
  <div class="w-full">
    <div
      class="relative aspect-video h-full overflow-hidden rounded-lg shadow border border-gray-300 dark:border-gray-600">
      <video ref="videoRef" class="w-full h-full" playsinline :src="src" />
    </div>
  </div>
</template>