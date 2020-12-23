<template>
  <fragment>
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
  computed: {
    ...mapGetters({
      breakpoint: 'screen/breakpoint'
    })
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
      setMousePos: 'screen/setMousePos'
    })
  }
}
</script>

<style lang="css">
  :root {
    --shadow: drop-shadow(0px 0px 4px rgba(0,0,0,.25));
  }
  .shadow {
    filter: var(--shadow);
  }
</style>