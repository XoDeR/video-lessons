<script setup lang="ts">
import LessonCard from '@/components/LessonCard.vue';
import LessonLayout from '@/layouts/LessonLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import { Page, PageProps } from '@inertiajs/core'
import { AppPageProps } from '@/types';

interface Lesson {
  id: number;
  title: string;
  description: string;
  thumbnail_url: string;
}

interface LessonsPageData {
  data: Lesson[]
  current_page: number
  last_page: number
  next_page_url: string | null
}

const props = defineProps<{
  lessons: {
    data: Lesson[]
    current_page: number
    last_page: number
    next_page_url: string | null
  }
}>();

const lessons = ref([...props.lessons.data]);
const page = ref(props.lessons.current_page);
const nextPageUrl = ref(props.lessons.next_page_url);
const loading = ref(false);

const observerTarget = ref<HTMLElement | null>(null);

const loadMore = async () => {
  if (!nextPageUrl.value || loading.value) return
  loading.value = true

  const url = new URL(nextPageUrl.value, window.location.origin)
  const nextPage = url.searchParams.get('page')

  router.get(
    route('home'),
    { page: nextPage },
    {
      preserveScroll: true,
      preserveState: true,
      replace: true,
      only: ['lessons'],

      onSuccess: (pageData: Page<PageProps>) => {
        const lessonsData = pageData.props.lessons as LessonsPageData;
        lessons.value.push(...lessonsData.data)
        page.value = lessonsData.current_page
        nextPageUrl.value = lessonsData.next_page_url
        loading.value = false
        window.history.replaceState({}, '', window.location.pathname)
      },
    }
  )
}

onMounted(() => {
  const observer = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
      loadMore()
    }
  })
  if (observerTarget.value) observer.observe(observerTarget.value)
})
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

    <div ref="observerTarget" class="col-span-full h-10"></div>

    <div v-if="loading" class="col-span-full flex justify-center py-4">
      <svg class="h-6 w-6 animate-spin text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z" />
      </svg>
    </div>

  </LessonLayout>
</template>