<template>
  <div :class="$route.name">
    <n-link v-if="isSecondary" class="close-button" :to="'/'">
      <close-icon class="fit-contain"/>
    </n-link>
    <div v-if="notHome" class="top-header flex-centered shadow">
      <n-link class="home-link image-contain" :to="'/'">
        <inline-svg v-if="apiData" class="fit-contain" :src="apiData.options.landing_page.landing_logo"/>
      </n-link>
    </div>
    <header :class="['header-wrapper', isSecondary ? 'secondary' : 'top-level']">
      <navigation/>
    </header>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import Navigation from './Navigation'
import CloseIcon from './ui/CloseIcon'

export default {
  name: 'AppHeader',
  components: {
    Navigation,
    CloseIcon
  },
  computed: {
    notHome() {
      return this.$route.name !== "index" ? true : false
    },
    isSecondary() {
      return (this.$route.name === "projects-id" || this.$route.name === "artists-id") ? true : false
    },
    ...mapState({
      apiData: 'api'
    })
  }
}
</script>

<style>
  header {
    width: 100%;
    bottom: 0;
    z-index: 10;
    height: var(--header-height);
    z-index: 9000;
    filter: var(--shadow);
  }
  .header-wrapper {
    background-color: var(--footer_color);
  }
  .header-wrapper.top-level {
    position: fixed;
  }
  .header-wrapper.secondary {
    position: relative;
    margin-top: var(--pad-double);
  }
  .projects-id .top-header,
  .artists-id .top-header {
    display: none;
  }
  .home-link {
    position: relative;
    height: calc(var(--header-height) / 1.25);
    width: 14rem;
  }
  .home-link svg * {
    fill: white!important;
    fill: var(--logo_color)!important;
  }
  .top-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: var(--header-height);
    z-index: 1000;
  }
  .close-button {
    position: fixed;
    top: var(--pad-single);
    right: var(--pad-single);
    z-index: 9000;
    width: calc(var(--header-height) / 1.25);
    height: calc(var(--header-height) / 1.25);
  }
</style>
