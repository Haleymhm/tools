<template>
    <div
      class="fullscreen bg-blue text-white text-center q-pa-md flex flex-center"
    >
      <div class="q-pa-md" style="max-width: 560px">
        <q-form @submit="onSubmit" class="q-gutter-md">
          <q-input
            filled
            v-model="username"
            label="Username"
            lazy-rules
            :rules="[(val) => (val && val.length > 0) || 'Please type something']"
          />
  
          <q-input
            filled
            type="password"
            v-model="password"
            label="Password"
            lazy-rules
            :rules="[
              (val) => (val !== null && val !== '') || 'Please type your age',
            ]"
          />
  
          <div>
            <q-btn label="Submit" type="submit" color="primary" />
            
          </div>
        </q-form>
      </div>
    </div>
  </template>
  
  <script>
  import { defineComponent, ref } from "vue";
  import { useQuasar } from "quasar";
  
  export default defineComponent({
    name: "LoginPage",
    setup() {
      const $q = useQuasar();
      const username = ref("");
      const password = ref("");
  
      function onSubmit() {
        alert("onSubmit");
        $q.notify({
          color: "green-4",
          textColor: "white",
          icon: "cloud_done",
          message: "Submitted",
        });
      }
  
      return {
        username,
        password,
        onSubmit,
      };
    },
  });
  </script>
  