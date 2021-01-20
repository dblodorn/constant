<template>
  <viewport-wrapper
    :zIndex="0"
    class="bg-panel"
  >
    <client-only>
      <div 
        v-if="apiData" 
        :class="['bg-wrapper fit-cover', apiData && 'reveal']"
        :style="cardRotate"
      >
        <inline-svg 
          :key="index"
          class="bg-svg shadow fit-cover big-fade-in" 
          :src="bgPattern"
          :preserveAspectRatio="'none'"
        />
      </div>
    </client-only>
  </viewport-wrapper>
</template>

<script>
import { mapState } from 'vuex'

export default {
  name: "PatternBg",
  computed: {
    bgPattern() {
      const pattern = this.apiData.options.bg_patterns[this.$store.state.patternIndex].bg_pattern
      return pattern
    },
    cardRotate() {
      return this.$cardPerspective(
        this.$store,
        this.apiData.options.bg_3d.x, 
        this.apiData.options.bg_3d.y,
        this.apiData.options.bg_3d.scale
      )
    },
    ...mapState({
      apiData: 'api',
      index: 'patternIndex'
    })
  }
  
}
</script>

<style lang="css">
  @keyframes bigFade {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }
  .big-fade-in {
    animation-name: bigFade;
    animation-duration: 1.5s;
    animation-fill-mode: both;
    animation-timing-function:cubic-bezier(0.25, 0.46, 0.45, 0.94);
  }
  .bg-svg * {
    fill: var(--pattern_color);
  }
  .bg-panel {
    transform: translateZ(0);
    perspective: 2000px;
    overflow: hidden;
  }
  .bg-wrapper {
    transform: translateZ(0);
    transform-style: preserve-3d;
    backface-visibility: hidden;
    pointer-events: none;
    overflow: hidden;
    opacity: 0;
    will-change: opacity;
    transition: opacity 2500ms ease 500ms;
  }
  .bg-wrapper.reveal {
    opacity: 1;
  }
</style>