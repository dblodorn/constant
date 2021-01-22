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
          :to="`/${location}/${returnPost(item, data).slug}`"
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
    <pattern-bg/>
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
    },
    location: {
      type: String,
      required: true
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
        this.image = {
          src: img.thumbnail, 
          mask: img.feature_image_mask,
          title: img.title
        }
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
