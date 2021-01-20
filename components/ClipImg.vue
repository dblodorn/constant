<template>
  <div 
    :class="['clip-image']"
    :style="cardRotate"
  >
    <div 
      :class="['clip-image-wrapper shadow', loaded && 'loaded']"
      :style="`padding-bottom: ${proportion};`"
    >
      <img 
        ref="image" 
        class="svg-clip"
        v-on:load="imgLoaded" 
        :style="mask && `--clip-image: url(${mask});`"
        :src="src"
        :alt="alt"
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "ClipImg",
  props: {
    src: {
      type: String
    },
    mask: {
      type: [String, Boolean],
      default: '/placeholder/mask.svg',
      useDefaultForNull: true
    },
    alt: {
      type: String
    }
  },
  data() {
    return {
      proportion: '100%',
      loaded: false
    }
  },
  computed: {
    cardRotate() {
      return this.$cardPerspective(this.$store, 50, 40, 1)
    }
  },
  methods: {
    imgLoaded() {
      this.$nextTick(() => {
        this.proportion = `${this.$refs.image.naturalHeight / this.$refs.image.naturalWidth * 100}%`
        setTimeout(() => {this.loaded = true}, 500)
      })
    }
  }
}
</script>

<style lang="css">
  .clip-image {
    width: 100%;
    position: relative;
    transform-style: preserve-3d;
    backface-visibility: hidden;
  }
  .clip-image-wrapper.loaded {
    opacity: 1;
  }
  .clip-image-wrapper {
    width: 100%;
    height: 0;
    overflow: visible;
    position: relative;
    opacity: 0;
    transition: all 500ms cubic-bezier(.19,.48,.27,.99);
    will-change: all;
  }
  .svg-clip {
    mask-image: var(--clip-image);
    mask-position: center;
    mask-size: cover;
    mask-repeat: no-repeat;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
  }
</style>