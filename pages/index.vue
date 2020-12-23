<template>
  <viewport-wrapper
    :zIndex="1"
  >
    <component :is="'style'">
      :root {
        --bg_color: {{data.options.styling.landing_bg_color}}!important;
        --logo_color: {{data.options.styling.landing_type_color}}!important;
        --pattern_color: {{data.options.styling.landing_pattern_color}}!important;
        --landing_type_color: {{data.options.styling.landing_type_color}}!important;
        --footer_color: {{data.options.styling.landing_footer_color}}!important;
        --footer_type_color: {{data.options.styling.landing_footer_type_color}}!important;
      }
    </component>
    <div class="fit-cover logo-wrapper shadow">
      <div class="landing-logo center">
        <inline-svg :src="data.options.landing_page.landing_logo"/>
      </div>
      <p class="landing-tagline y-pad-top y-pad-single" v-html="data.options.landing_page.landing_tagline"/>
    </div>
    <pattern-bg/>
  </viewport-wrapper>
</template>

<script>
import axios from 'axios'

export default {
  asyncData ({ params }) {
    return axios.get(`${process.env.CMS_URL}data`)
      .then((res) => {
        return { data: res.data }
      })
  },
  head () {
    return {
      title: process.env.APP_TITLE,
      meta: [
        { hid: 'description', name: 'description', content: 'My custom description' },
        { hid: 'image', name: 'image', content: `${process.env.BASE_URL}/imgs/derpy-avatar-circle.png` },
      ]
    }
  }
}
</script>

<style lang="css">
  .logo-wrapper {
    height: calc(100vh - var(--header-height));
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 9000;
  }
  .landing-logo {
    max-width: 40rem;
    width: 100%;
    position: relative;
  }
  .landing-logo svg {
    width: 100%;
    height: auto;
  }
  .landing-logo * {
    fill: var(--logo_color);
  }
</style>