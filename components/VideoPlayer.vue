<template>
  <div class="video-player-component">
    <html-video 
      v-if="type === 'html'"
      :url="url"
      :autoplay="autoplay"
      :cover="cover"
      :loops="loops"
      :muted="muted"
      :controls="controls"
    />
    <youtube-plugin 
      v-if="type === 'youtube'"
      :url="url"
      :autoplay="autoplay"
      :loops="loops"
      :muted="muted"
      :controls="controls"
    />
    <vimeo-plugin 
      v-if="type === 'vimeo'"
      :url="url"
      :autoplay="autoplay"
      :loops="loops"
      :muted="muted"
      :controls="controls"
    />
  </div>
</template>

<script>
import VimeoPlugin from '~/components/plugins/VimeoPlugin'
import YoutubePlugin from '~/components/plugins/YoutubePlugin'
import HtmlVideo from '~/components/plugins/html-video'

export default {
  name: 'VideoPlayer',
  components: {
    VimeoPlugin,
    YoutubePlugin,
    HtmlVideo
  },
  props: {
    type: {
      required: false,
      type: String,
      default: 'youtube',
      useDefaultForNull: true
    },
    url: {
      required: false,
			type: String,
			default: 'https://www.youtube.com/watch?v=gHB-eGGDo8Y&t=2s',
      useDefaultForNull: true
    },
    cover: {
      required: false,
      type: [String, Boolean],
      default: false,
      useDefaultForNull: true
    },
		autoplay: {
			required: false,
			type: Boolean,
			default: false,
      useDefaultForNull: true
		},
		controls: {
			required: false,
			type: Boolean,
			default: false,
      useDefaultForNull: true
    },
    muted: {
			required: false,
			type: Boolean,
			default: false,
      useDefaultForNull: true
    },
    loops: {
			required: false,
			type: Boolean,
			default: false,
      useDefaultForNull: true
    }
  }
}
</script>

<style lang="css">
.video-embed {
  width: 100%;
  height: 0;
  padding-bottom: 56.25%;
  overflow-y: visible;
  position: relative;
  z-index: 100;
}

.video-embed > div,
.video-embed > div > iframe,
.video-embed > div > video,
.video-wrapper,
.video-wrapper > iframe,
.video-embed iframe  {
  width: 100%!important;
  height: 100%!important;
  position: absolute!important;
  top: 0!important;
  left: 0!important;
}
</style>