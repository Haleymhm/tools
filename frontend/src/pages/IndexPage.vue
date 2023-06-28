<template>
  <q-page class="flex flex-center">
    <calendar-component></calendar-component>
  </q-page>
</template>

<script>
import { defineComponent } from 'vue'
import CalendarComponent from '../components/CalendarComponent.vue';

export default defineComponent({
  components: { CalendarComponent },
  name: 'IndexPage'
})
</script>
