<template>
  <viewport-wrapper
    :zIndex="0"
  >
    <div v-if="apiData" class="bg-wrapper fit-cover">
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
</style>