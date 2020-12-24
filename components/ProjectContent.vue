<template>
  <article class="content-article y-pad-big y-pad-bottom mw-full" v-if="post">
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
