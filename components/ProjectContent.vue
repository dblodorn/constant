<template>
  <article class="project-article y-pad-big y-pad-bottom mw-full center" v-if="post">
    <slot/>
    <h1 class="project-title pad-single">
      <span v-html="post.title"/>
    </h1>
    <div class="mw-med center">
      <img class="img-auto-width" :src="post.key_image ? post.key_image : post.thumbnail" :alt="post.title">
    </div>
    <flex-media-layout 
      :layout="post.layout"
    />
  </article>
  <div v-else class="empty">
    <h1>Loading</h1>
  </div>
</template>

<script>
  export default {
    name: "ProjectContent",
    props: {
      post: {
        type: [Object, Boolean],
        default: false
      }
    }
  }
</script>

<style lang="css">
  .project-article {
    z-index: 10;
  }
  .project-article * {
    color: var(--type_color)!important;
  }
  .project-title {
    position: sticky;
    top: 0;
  }
</style>