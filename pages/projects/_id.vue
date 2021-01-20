<template>
  <project-content
    :post="post"
  >
    <component :is="'style'">
      :root {
        --bg_color: {{apiData.options.styling.projects_post_bg_color}}!important;
        --pattern_color: {{apiData.options.styling.projects_post_pattern_color}}!important;
        --type_color: {{apiData.options.styling.projects_post_type_color}}!important;
        --footer_color: {{apiData.options.styling.projects_post_footer_color}}!important;
        --footer_type_color: {{apiData.options.styling.projects_post_footer_type_color}}!important;
      }
    </component>
    <pattern-bg/>
  </project-content>
</template>

<script>
import { mapState } from 'vuex'
import axios from 'axios'
import ProjectContent from '~/components/ProjectContent'

export default {
  asyncData ({ params }) {
    return axios.get(`${process.env.CMS_URL}project/?name=${params.id}`)
      .then((res) => {
        return { post: res.data }
      })
  },
  components: {
    ProjectContent
  },
  watch: {
    error: 'errorRedirect'
  },
  computed: {
    cardRotate() {
      return this.$cardPerspective(this.$store, 50, 40, 1.35)
    },
    ...mapState({
      apiData: 'api'
    })
  },
  methods: {
    errorRedirect() {
      if (this.error) {
        this.$router.push('/404')
      }
    }
  },
  head () {
    return {
      title: `${this.post.title} | ${process.env.APP_TITLE}`,
      meta: [
        { hid: 'description', name: 'description', content: this.post.meta_description ? this.post.meta_description : this.post.title },
        { hid: 'image', name: 'image', content: this.post.thumbnail }
      ]
    }
  }
}
</script>
