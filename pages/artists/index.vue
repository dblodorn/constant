<template>
  <fragment>
    <component :is="'style'">
      :root {
        --bg_color: {{data.options.styling.artists_bg_color}}!important;
        --nav_type_color: {{data.options.styling.artists_nav_type_color}}!important;
        --logo_color: {{data.options.styling.artists_nav_type_color}}!important;
        --footer_color: {{data.options.styling.artists_footer_color}}!important;
        --footer_type_color: {{data.options.styling.artists_footer_type_color}}!important;
      }
    </component>
    <nav class="post-nav flex-column">
      <n-link
        class="nav-type"
        :style="cardRotate"
        v-for="item in data.options.artists_nav"
        :key="item"
        :to="`/artists/${returnPost(item, data.artists).slug}`"
      >
        <span
          v-html="returnPost(item, data.artists).title"
        />
      </n-link>
    </nav>
  </fragment>
</template>

<script>
import axios from 'axios'
import { mapState } from 'vuex'

export default {
  asyncData ({ params }) {
    return axios.get(`${process.env.CMS_URL}data`)
      .then((res) => {
        return { data: res.data }
      })
  },
  methods: {
    returnPost(id, data) {
      return this.$dataById(id, data)
    }
  },
  computed: {
    cardRotate() {
      return this.$cardPerspective(this.$store, 60, 50, 1)
    },
  },
  head () {
    return {
      title: `Artists | ${process.env.APP_TITLE}`,
      meta: [
        { hid: 'description', name: 'description', content: 'My custom description' },
        { hid: 'image', name: 'image', content: `${process.env.BASE_URL}/imgs/derpy-avatar-circle.png` },
      ]
    }
  }
}
</script>
