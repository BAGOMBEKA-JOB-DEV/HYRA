<template>
  <div class="flex items-center justify-between mb-4 p-4  shadow-md rounded-md">
    <h2 class="xl:lg:text-2xl text-md font-bold text-white font-bold flex animate-pulse ">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="size-6 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
      </svg>

      {{ title }}
    </h2>
    <div class="text-white font-semibold xl:lg:text-lg text-sm">
      Time Left: {{ formattedTime }}
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue'

const props = defineProps({
  title: {
    default: 'Flash sales'
  },
  /** 
   * The end time for your countdown, e.g. new Date("2025-12-31T23:59:59")
   * Defaults to 43 minutes 52 seconds from the moment this component is mounted.
   */
  endTime: {
    type: Date,
    default: () => new Date(Date.now() + 43 * 60 * 1000 + 52 * 1000)
  }
})

const hours = ref(0)
const minutes = ref(0)
const seconds = ref(0)
let intervalId

/**
 * updateTime: calculates remaining time and updates the reactive refs.
 */
const updateTime = () => {
  const now = new Date()
  const diff = props.endTime.getTime() - now.getTime()

  if (diff <= 0) {
    // Time's up—stop the timer
    hours.value = 0
    minutes.value = 0
    seconds.value = 0
    clearInterval(intervalId)
  } else {
    const totalSeconds = Math.floor(diff / 1000)
    hours.value = Math.floor(totalSeconds / 3600)
    minutes.value = Math.floor((totalSeconds % 3600) / 60)
    seconds.value = totalSeconds % 60
  }
}

/**
 * formattedTime: returns the HH:MM:SS string with zero-padding.
 */
const formattedTime = computed(() => {
  const hh = hours.value.toString().padStart(2, '0')
  const mm = minutes.value.toString().padStart(2, '0')
  const ss = seconds.value.toString().padStart(2, '0')
  return `${hh}h:${mm}m:${ss}s`
})

onMounted(() => {
  updateTime()
  intervalId = setInterval(updateTime, 1000)
})

onUnmounted(() => {
  clearInterval(intervalId)
})
</script>