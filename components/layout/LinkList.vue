<template>
  <menu class="link-list-wrapper flex-row-wrap text-align-center">
    <a 
      v-for="(link, i) in links"
      :key="`link-${i}`"
      :href="link.url"
      class="h3 x-pad-single"
    >
      <span v-html="link.cta"/>
    </a>
  </menu>
</template>

<script>
export default {
  name: "LinkList",
  props: {
    links: {
      type: Array,
      default: []
    }
  }
}
</script>

<style lang="css">
</style>