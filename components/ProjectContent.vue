<template>
  <article class="content-article y-pad-big y-pad-bottom mw-full" v-if="post">
    <slot/>
    <div class="content-inner">
      <h1 class="project-title pad-single">
        <span v-html="post.title"/>
      </h1>
      <div class="mw-med center">
        <clip-img
          :src="post.key_image ? post.key_image : post.thumbnail"
          :mask="post.key_image_mask"
          :alt="post.title"
        />
      </div>
      <flex-media-layout 
        class="animate__animated animate__fadeIn animate__delay-1s"
        :layout="post.layout"
      />
    </div>
  </article>
  <div v-else class="empty">
    <h1>Loading</h1>
  </div>
</template>

<script>
import ClipImg from './ClipImg'

export default {
  name: "ProjectContent",
  components: {
    ClipImg
  },
  props: {
    post: {
      type: [Object, Boolean],
      default: false
    }
  },
  computed: {
    cardRotate() {
      return this.$cardPerspective(this.$store, 50, 40, 1.35)
    }
  }
}
</script>
