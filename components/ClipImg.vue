<template>
  <div class="clip-image-wrapper shadow">
    <img class="img-auto-width svg-clip" :src="src" :alt="alt">
  </div>
</template>

<script>
export default {
  name: "ClipImg",
  props: {
    src: {
      type: String
    },
    alt: {
      type: String
    }
  }
}
</script>

<style lang="css">
  .clip-image-wrapper {
    width: 100%;
    height: auto;
    position: relative;
  }

  .svg-clip {
    mask-image: url('/placeholder/mask.svg');
    mask-position: center;
    mask-size: contain;
    mask-repeat: no-repeat;
    /*clip-path: url(#imgClip);*/
  }
</style>