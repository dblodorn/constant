<template>
  <div class="copy-block-wrapper">
    <article class="y-pad-big wysiwig center mw-med" v-html="copy"/>
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