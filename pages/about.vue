<template>
  <section class="mw-xl center y-pad-big">
    <component :is="'style'">
      :root {
        --bg_color: {{data.options.styling.about_bg_color}}!important;
        --pattern_color: {{data.options.styling.about_pattern_color}}!important;
        --type_color: {{data.options.styling.about_type_color}}!important;
        --footer_color: {{data.options.styling.about_footer_color}}!important;
        --footer_type_color: {{data.options.styling.about_footer_type_color}}!important;
      }
    </component>
    <article class="content-article y-pad-big y-pad-bottom mw-full center">
      <flex-media-layout 
        :layout="data.options.layout"
      />
      <client-only>
        <div class="mw-lg center">
          <contact-map
            :mapLink="data.options.map.map_link"
            :latitude="data.options.map.latitude"
            :longitude="data.options.map.longitude"
            :iconImg="data.options.map.icon"
            :zoomInt="data.options.map.zoom"
          />
        </div>
      </client-only>
    </article>
    <pattern-bg/>
  </section>
</template>

<script>
import axios from 'axios'
import ContactMap from '~/components/contact-map'

export default {
  asyncData ({ params }) {
    return axios.get(`${process.env.CMS_URL}data`)
      .then((res) => {
        return { data: res.data }
      })
  },
  components: {
    ContactMap
  },
  head () {
    return {
      title: `${process.env.APP_TITLE}`,
      meta: [
        { hid: 'description', name: 'description', content: 'My custom description' },
        { hid: 'image', name: 'image', content: `${process.env.BASE_URL}/imgs/derpy-avatar-circle.png` },
      ]
    }
  }
}
</script>
