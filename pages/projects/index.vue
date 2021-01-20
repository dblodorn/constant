<template>
  <section>
    <component :is="'style'">
      :root {
        --bg_color: {{data.options.styling.projects_bg_color}}!important;
        --nav_type_color: {{data.options.styling.projects_nav_type_color}}!important;
        --logo_color: {{data.options.styling.projects_nav_type_color}}!important;
        --footer_color: {{data.options.styling.projects_footer_color}}!important;
        --footer_type_color: {{data.options.styling.projects_footer_type_color}}!important;
      }
    </component>
    <nav class="post-nav flex-colum pad-single">
      <n-link
        class="nav-type"
        v-for="item in data.options.projects_nav"
        :key="item"
        :style="cardRotate"
        :to="`/projects/${returnPost(item, data.projects).slug}`"
      >
        {{returnPost(item, data.projects).title}}
      </n-link>
    </nav>
  </section>
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
      return this.$cardPerspective(this.$store, 20, 20, 1)
    },
  },
  head () {
    return {
      title: `Projects | ${process.env.APP_TITLE}`,
      meta: [
        { hid: 'description', name: 'description', content: 'My custom description' },
        { hid: 'image', name: 'image', content: `${process.env.BASE_URL}/imgs/derpy-avatar-circle.png` },
      ]
    }
  }
}
</script>
