<template>
  <section 
    v-if="layout.length"
    class="flex-media-layout mw-xl center"
  >  
    <div
      v-for="(item, i) of layout"
      :key="`${item.acf_fc_layout + i}`"
      :class="['mw-full center', item.acf_fc_layout]"
    >
      <video-player
        v-if="item.acf_fc_layout === 'video'"
        :type="item.type"
        :url="item.url"
        :cover="item.cover"
        :autoplay="item.autoplay"
        :controls="item.controls"
        :muted="item.muted"
        :loops="item.loops"
      />
      <link-list
        v-if="item.acf_fc_layout === 'link_list'"
        :links="item.links"
      />
      <slide-show
        v-if="item.acf_fc_layout === 'carousel'"
        :slides="item.images"
        :controls="item.controls"
        :pagination="item.bullets"
        :image_fit="item.image_fit"
        :autoplay="item.autoplay"
      />
      <copy-block
        v-if="item.acf_fc_layout === 'copy_block'"
        :copy="item.copy"
      />
      <image-grid
        v-if="item.acf_fc_layout === 'image_grid'"
        :images="item.images"
        :image_fit="item.image_fit"
        :grid_gap="item.grid_gap"
        :grid_classes="[
          item.small_columns,
          item.medium_columns,
          item.large_columns
        ]"
      />
    </div>
  </section>
</template>

<script>
import CopyBlock from './CopyBlock'
import LinkList from './LinkList'

export default {
  name: "FlexMediaLayout",
  components: {
    CopyBlock,
    LinkList
  },
  props: {
    layout: {
      required: true,
      type: Array,
      default: [],
      useDefaultForNull: true
    }
  }
}
</script>
