<template>
  <section>
    <component :is="'style'">
      :root {
        --bg_color: {{data.options.styling.projects_bg_color}}!important;
        --nav_type_color: {{data.options.styling.projects_nav_type_color}}!important;
        --logo_color: {{data.options.styling.projects_nav_type_color}}!important;
        --footer_color: {{data.options.styling.projects_footer_color}}!important;
        --footer_type_color: {{data.options.styling.projects_footer_type_color}}!important;
        --pattern_color: {{patternColor(data.options.styling.projects_bg_color)}}!important;
      }
    </component>
    <index-nav
      :menu="data.options.projects_nav"
      :data="data.projects"
      :location="'projects'"
    />
  </section>
</template>

<script>
import axios from 'axios'
import Color from 'color'
import { mapState } from 'vuex'

export default {
  asyncData ({ params }) {
    return axios.get(`${process.env.CMS_URL}data`)
      .then((res) => {
        return { data: res.data }
      })
  },
  methods: {
    patternColor(input) {
      const color = Color(input)
      return color.lighten(0.05)
    }
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
