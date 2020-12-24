<template>
  <div class="copy-block-wrapper">
    <article class="y-pad-big wysiwig center mw-lg" v-html="copy"/>
  </div>
</template>

<script>
export default {
  name: "CopyBlock",
  props: {
    copy: {
      type: String,
      default: ''
    }
  }
}
</script>

<style lang="css">
  .copy-block-wrapper {
    text-align: center;
  }
  .copy-block-wrapper h2 {
    padding-bottom: var(--pad-single);
  }
</style>