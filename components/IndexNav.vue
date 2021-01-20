<template>
  <fragment>
    <nav class="post-nav flex-column">
      <div
        class="post-nav-item"
        v-for="item in menu"
        :key="item"
        :style="cardRotate"
      >
        <n-link
          class="post-nav-type"
          :to="`/artists/${returnPost(item, data).slug}`"
          @mouseenter.native="hoverHandler(returnPost(item, data))"
          @mouseleave.native="hoverHandler(false)"
        >
          <span
            v-html="returnPost(item, data).title"
          />
        </n-link>
      </div>
    </nav>
    <div class="background-image-wrapper">
      <div v-if="image" class="image-zone flex-centered">
        <clip-img
          :src="image.src"
          :mask="image.mask"
          :alt="image.title"
        />
      </div>
    </div>
  </fragment>
</template>

<script>
export default {
  name: "IndexNav",
  props: {
    menu: {
      type: Array
    },
    data: {
      type: Array
    }
  },
  data() {
    return {
      image: false
    }
  },
  methods: {
    returnPost(id, data) {
      return this.$dataById(id, data)
    },
    hoverHandler(img) {
      if (!this.$store.state.screen.touch && (img !== false)) {
        this.image = {src: img.thumbnail, mask: img.key_image_mask, title: img.title}
      }
    },
  },
  computed: {
    cardRotate() {
      return this.$cardPerspective(this.$store, 60, 50, 1)
    },
  },
}
</script>

<style lang="css">
  .background-image-wrapper {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    pointer-events: none;
    z-index: 0;
  }
  .image-zone {
    width: 50%;
    height: 100%;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 1;
  }
</style>