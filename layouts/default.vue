<template>
  <fragment>
    <component :is="'style'">
      :root {
        --shadow: {{`drop-shadow(0px 0px ${shadowPosition}px rgba(0,0,0,.25))`}}!important;
      }
    </component>
    <main class="page-wrapper">
      <nuxt />
    </main>
    <app-header/>
  </fragment>
</template>

<script>
import debounce from 'lodash/debounce'
import { mapGetters, mapActions, mapMutations, mapState } from 'vuex'
import AppHeader from '@/components/AppHeader'
import AppFooter from '@/components/AppFooter'

export default {
  components: {
    AppHeader,
    AppFooter
  },
  watch: {
    $route () {
      this.setPattern()
    }
  },
  computed: {
    ...mapGetters({
      breakpoint: 'screen/breakpoint'
    }),
    shadowPosition() {
      const rangeX = Math.round(Math.cos((Math.round((this.$store.state.screen.mouseX / this.$store.state.screen.width) * 100) / 100) * 3) * 100) / 100
      const rangeY = Math.round(Math.cos((Math.round((this.$store.state.screen.mouseY / this.$store.state.screen.height) * 100) / 100) * 3) * 100) / 100
      const range = rangeX - rangeY
      const position = (range < 0 ? range * -1 : range) * 6
      return position
    },
  },
  data() {
    return {
      menuState: false
    }
  },
  created () {
    this.getData()
    this.debouncedResize = debounce(this.resize, 50)
  },
  mounted () {
    this.setTouch()
    this.setScreenSize()
    window.addEventListener('resize', this.debouncedResize, { passive: true })
    window.addEventListener('orientationchange', this.debouncedResize)
    window.addEventListener('scroll', this.scroll, { passive: true })
    window.addEventListener('mousemove', this.mouseMove, { passive: true })
  },
  beforeDestroy () {
    window.removeEventListener('resize', this.debouncedResize, {
      passive: true
    })
    window.removeEventListener('orientationchange', this.debouncedResize)
    window.removeEventListener('scroll', this.scroll, {
      passive: true
    })
    window.removeEventListener('mousemove', this.mouseMove, { passive: true })
  },
  methods: {
    async resize() {
      const size = await this.setScreenSize()
      this.$nextTick(() => this.$bus.$emit('resize', size))
    },
    scroll() {
      const pos = window.scrollY || document.documentElement.scrollTop
      this.setScroll(pos)
      this.$bus.$emit('scroll', pos)
    },
    mouseMove({ pageX = 0, pageY = 0 }) {
      this.setMousePos({ x: pageX, y: pageY })
      this.$bus.$emit('mousemove', { x: pageX, y: pageY })
    },
    toggleMenu() {
      this.menuState = !this.menuState
    },
    ...mapActions({
      getData: 'getData',
      setTouch: 'screen/setTouch',
      setScreenSize: 'screen/setScreenSize'
    }),
    ...mapMutations({
      setScroll: 'screen/setScroll',
      setMousePos: 'screen/setMousePos',
      setPattern: 'SET_PATTERN'
    })
  }
}
</script>

<style lang="css">
  .shadow {
    filter: var(--shadow);
  }
</style>