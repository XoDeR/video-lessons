<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

</script>
<template>
  <header
    class="fixed top-0 left-0 right-0 z-20 border-b border-[#e0e0dc] dark:border-[#2c2c2a] bg-[#FDFDFC] dark:bg-[#0a0a0a] px-6 py-4">
    <div class="mx-auto flex max-w-6xl items-center justify-between">
      <div>
        <slot name="title">
          <h1 class="text-lg font-semibold">Lessons</h1>
        </slot>
      </div>
      <nav class="flex items-center gap-4 text-sm">
        <Link v-if="$page.props.auth.user" :href="route('dashboard.index')"
          class="rounded-md border border-[#19140035] px-4 py-1.5 hover:border-[#1915014a] dark:border-[#3E3E3A] dark:hover:border-[#62605b]">
        Dashboard
        </Link>
        <Link v-else :href="route('login')"
          class="rounded-md border border-transparent px-4 py-1.5 hover:border-[#19140035] dark:hover:border-[#3E3E3A]">
        Log in
        </Link>
      </nav>
    </div>
  </header>
</template>