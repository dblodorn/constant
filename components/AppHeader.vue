<template>
  <div :class="['header-container', $route.name]">
    <n-link v-if="isSecondary" class="close-button" :to="backLink">
      <close-icon class="fit-contain"/>
    </n-link>
    <div v-if="notHome" :class="['top-header flex-centered bezier-150 shadow', scroll > 50 && 'hide']">
      <n-link :style="headerLogoRotate" class="home-link image-contain" :to="'/'">
        <inline-svg v-if="apiData" class="fit-contain" :src="apiData.options.landing_page.landing_logo"/>
      </n-link>
    </div>
    <header v-if="!isSecondary" :class="['header-wrapper top-level']">
      <navigation :style="navRotate"/>
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
    headerLogoRotate() {
      return this.$cardPerspective(this.$store, 40, 40)
    },
    navRotate() {
      const ay = (this.$store.state.screen.height / 2 - this.$store.state.screen.mouseY) / 80
      return {
        transform: `rotateX(${ay}deg)`
      }
    },
    scroll () {
      return this.$store.state.screen.scroll
    },
    isSecondary() {
      return (this.$route.name === "projects-id" || this.$route.name === "artists-id") ? true : false
    },
    backLink() {
      if (this.$route.name === "projects-id") {
        return '/projects'
      } else if (this.$route.name === "artists-id") {
        return '/artists'
      } else {
        return '/'
      }
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
    transform: translateZ(0);
    perspective: 500px;
    transform-style: preserve-3d;
    position: fixed;
  }
  .header-container {
    overflow-x: hidden;
  }
  .header-wrapper.top-level {
    position: fixed;
  }
  .header-wrapper.secondary {
    /* position: relative; */
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
    perspective: 500px;
    transform-style: preserve-3d;
  }
  .top-header.hide {
    opacity: 0;
    pointer-events: none;
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
