<template>
  <viewport-wrapper
    :zIndex="0"
    class="bg-panel"
  >
    <div 
      v-if="apiData" 
      class="bg-wrapper fit-cover"
      :style="cardRotate"
    >
      <inline-svg 
        class="bg-svg shadow fit-cover" 
        :src="apiData.options.bg_patterns[0].bg_pattern"
        :preserveAspectRatio="'none'"
      />
    </div>
  </viewport-wrapper>
</template>

<script>
import { mapState } from 'vuex'

export default {
  name: "PatternBg",
  computed: {
    cardRotate() {
      return this.$cardPerspective(this.$store, 50, 40, 1.35)
    },
    ...mapState({
      apiData: 'api'
    })
  }
  
}
</script>

<style lang="css">
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
  }
</style>