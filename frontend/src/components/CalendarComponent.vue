<template>
  <div>
    {{ selectedDate }} +++
    <navigation-bar @today="onToday" @prev="onPrev" @next="onNext" />
    <div style="display: flex; width: 100%">
      <q-calendar-month
        ref="calendar"
        v-model="selectedDate"
        date-type="rounded"
        locale="es"
        :day-min-height="50"
        :day-height="0"
        animated
        bordered
        @change="onChange"
        @moved="onMoved"
        @click-date="onClickDate"
        @click-day="onClickDay"
        @click-workweek="onClickWorkweek"
        @click-head-workweek="onClickHeadWorkweek"
        @click-head-day="onClickHeadDay"
      />
    </div>
  </div>
</template>
<script>
import {
  QCalendarMonth,
  today,
} from "@quasar/quasar-ui-qcalendar/src/index.js";
import "@quasar/quasar-ui-qcalendar/src/QCalendarVariables.sass";
import "@quasar/quasar-ui-qcalendar/src/QCalendarTransitions.sass";
import "@quasar/quasar-ui-qcalendar/src/QCalendarMonth.sass";

import { defineComponent } from "vue";
import NavigationBar from "../components/NavigationBar.vue";
export default defineComponent({
  name: "CalendarPage",
  components: {
    NavigationBar,
    QCalendarMonth,
  },
  data() {
    return {
      selectedDate: today(),
      dateType: "square",
    };
  },

  methods: {
    onToday() {
      this.$refs.calendar.moveToToday();
    },
    onPrev() {
      this.$refs.calendar.prev();
    },
    onNext() {
      this.$refs.calendar.next();
    },
    onMoved(data) {
      console.log("onMoved", data);
    },
    onChange(data) {
      console.log("onChange", data);
    },
    onClickDate(data) {
      console.log("onClickDate", data);
    },
    onClickDay(data) {
      console.log("onClickDay", data);
    },
    onClickWorkweek(data) {
      console.log("onClickWorkweek", data);
    },
    onClickHeadDay(data) {
      console.log("onClickHeadDay", data);
    },
    onClickHeadWorkweek(data) {
      console.log("onClickHeadWorkweek", data);
    },
  },
});
</script>