<template>
  <viewport-wrapper
    :zIndex="1"
    class="wrapper"
  >
    <component :is="'style'">
      :root {
        --bg_color: {{data.options.styling.landing_bg_color}}!important;
        --logo_color: {{data.options.styling.landing_type_color}}!important;
        --pattern_color: {{data.options.styling.landing_pattern_color}}!important;
        --landing_type_color: {{data.options.styling.landing_type_color}}!important;
        --footer_color: {{data.options.styling.landing_footer_color}}!important;
        --footer_type_color: {{data.options.styling.landing_footer_type_color}}!important;
        --motion-shadow: {{`0 0 5px rgba(0,0,0,.1)`}}!important;
      }
    </component>
    <div
      class="logo-wrapper shadow bg-card"
      :style="titleRotate"
    >
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
  computed: {
    titleRotate() {
      return this.$cardPerspective(this.$store, 30, 20, 1)
    }
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
  .wrapper {
    transform: translateZ(0);
    perspective: 2000px;
    transform-style: preserve-3d;
    overflow: hidden;
  }
  .logo-wrapper {
    transform-style: preserve-3d;
    height: 30rem;
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 9000;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
  }
  .landing-logo {
    max-width: 40rem;
    width: 100%;
    position: relative;
    transform: translateZ(200px);
    transform-style: preserve-3d;
  }
  .landing-logo svg {
    width: 100%;
    height: auto;
  }
  .landing-logo * {
    fill: var(--logo_color);
  }
  .landing-tagline {
    transform: translateZ(-150px);
    transform-style: preserve-3d;
  }
</style>