<template>
  <q-layout view="hHh lpR fFf" class="bg-grey-1">
    <q-header elevated class="bg-white text-grey-8" height-hint="64">
      <q-bar dense class="bg-light-blue-10 text-white">
        <div>mobi-net</div>
        <q-icon name="email" />
        <q-space />
        <q-icon name="bluetooth" />
        <q-icon name="signal_wifi_4_bar" />
        <q-icon name="signal_cellular_4_bar" />
        <div class="gt-xs">100%</div>
        <q-icon name="battery_1_bar" class="text-red" />
        <div>10:00AM</div>
      </q-bar>
      <q-toolbar class="GNL__toolbar">
        <q-toolbar-title v-if="$q.screen.gt.xs" shrink class="row items-center no-wrap">
          <a href="#/home">
            <img alt="Quasar logo" src="~assets/shield.svg" style="width: 50px; height: 50px" /></a>
            <span class="q-ml-sm">Safe Track</span>
          
        </q-toolbar-title>

        <q-btn flat dense round @click="toggleLeftDrawer" aria-label="Menu" icon="menu" class="q-ml-sm" />
        <q-space />

        <q-input class="GNL__toolbar-input" outlined dense v-model="search" color="bg-grey-7 shadow-1"
          placeholder="Search for topics, locations & sources">
          <template v-slot:prepend>
            <q-icon name="search" />
          </template>
        </q-input>

        <q-space />

        <div class="q-gutter-sm row items-center no-wrap">
          <q-btn round dense flat color="grey-8" icon="notifications">
            <q-badge color="red" text-color="white" floating> 2 </q-badge>
            <q-tooltip>Notifications</q-tooltip>
          </q-btn>
          <q-btn round flat>
            <q-avatar size="26px">
              <img src="https://cdn.quasar.dev/img/boy-avatar.png" />
            </q-avatar>
            <q-tooltip>Account</q-tooltip>
          </q-btn>

          <q-btn round dense flat color="grey-8" @click="$q.fullscreen.toggle()"
            :icon="$q.fullscreen.isActive ? 'fullscreen_exit' : 'fullscreen'"
            :label="$q.fullscreen.isActive ? ' ' : ' '" />
        </div>
      </q-toolbar>
    </q-header>

    <q-drawer v-model="leftDrawerOpen" show-if-above bordered class="bg-white" :width="280">
      <q-scroll-area class="fit">
        <q-list padding class="text-grey-8">
          <q-item class="GNL__drawer-item" v-ripple v-for="link in links1" :key="link.text" clickable :href="link.link">
            <q-item-section avatar>
              <q-icon :name="link.icon" />
            </q-item-section>
            <q-item-section>
              <q-item-label>{{ link.text }}</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
      </q-scroll-area>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from "vue";
import { useQuasar } from "quasar";

export default defineComponent({
  name: "GoogleNewsLayout",

  setup() {
    const $q = useQuasar();
    const leftDrawerOpen = ref(false);
    const search = ref("");
    const showAdvanced = ref(false);
    const showDateOptions = ref(false);
    const exactPhrase = ref("");
    const hasWords = ref("");
    const excludeWords = ref("");
    const byWebsite = ref("");
    const byDate = ref("Any time");

    $q.addressbarColor.set("#a2e3fa");

    $q.loading.show({
      delay: 400, // ms
    });

    $q.loading.hide();

    // Requesting fullscreen mode:
    $q.fullscreen
      .request()
      .then(() => {
        // success!
      })
      .catch((err) => {
        // oh, no!!!
      });

    // Exiting fullscreen mode:
    $q.fullscreen
      .exit()
      .then(() => {
        // success!
      })
      .catch((err) => {
        // oh, no!!!
      });

    function onClear() {
      exactPhrase.value = "";
      hasWords.value = "";
      excludeWords.value = "";
      byWebsite.value = "";
      byDate.value = "Any time";
    }

    function changeDate(option) {
      byDate.value = option;
      showDateOptions.value = false;
    }

    function toggleLeftDrawer() {
      leftDrawerOpen.value = !leftDrawerOpen.value;
    }

    return {
      leftDrawerOpen,
      search,
      showAdvanced,
      showDateOptions,
      exactPhrase,
      hasWords,
      excludeWords,
      byWebsite,
      byDate,

      links1: [
        { icon: "star_border", text: "Empresa", link: "#/company" },
        { icon: "store", text: "Unidad Opreativa", link: "#/uniit" },
        { icon: "view_list", text: "Tipo Actividad", link: "#/tactivity" },
        { icon: "manage_accounts", text: "Usuarios", link: "#/user" },
        { icon: "person", text: "Perfil", link: "#/profile" },
      ],
      onClear,
      changeDate,
      toggleLeftDrawer,
    };
  },
});
</script>

<style lang="sass">
.GNL

  &__toolbar
    height: 64px

  &__toolbar-input
    width: 55%

  &__drawer-item
    line-height: 24px
    border-radius: 0 24px 24px 0
    margin-right: 12px

    .q-item__section--avatar
      .q-icon
        color: #5f6368

    .q-item__label
      color: #3c4043
      letter-spacing: .01785714em
      font-size: .875rem
      font-weight: 500
      line-height: 1.25rem

  &__drawer-footer-link
    color: inherit
    text-decoration: none
    font-weight: 500
    font-size: .75rem

    &:hover
      color: #000
</style>
