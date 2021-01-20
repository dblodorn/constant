import Vue from 'vue'

import RawDisplayer from '~/components/util/RawDisplayer'
import Loading from '~/components/Loading'
import LazyImage from '~/components/LazyImage'
import VideoPlayer from '~/components/VideoPlayer'
import Copyright from '~/components/Copyright'
import PrevNext from '~/components/PrevNext'
import SlideShow from '~/components/SlideShow'
import ThumbnailLinkGrid from '~/components/layout/ThumbnailLinkGrid'
import ImageGrid from '~/components/layout/ImageGrid'
import FlexMediaLayout from '~/components/layout/FlexMediaLayout'
import ViewportWrapper from '~/components/ViewportWrapper'
import PatternBg from '~/components/PatternBg'
import IndexNav from '~/components/IndexNav'
import ClipImg from '~/components/ClipImg'

Vue.component('raw-displayer', RawDisplayer)
Vue.component('loading', Loading)
Vue.component('lazy-image', LazyImage)
Vue.component('video-player', VideoPlayer)
Vue.component('copyright', Copyright)
Vue.component('prev-next', PrevNext)
Vue.component('slide-show', SlideShow)
Vue.component('thumbnail-link-grid', ThumbnailLinkGrid)
Vue.component('image-grid', ImageGrid)
Vue.component('flex-media-layout', FlexMediaLayout)
Vue.component('viewport-wrapper', ViewportWrapper)
Vue.component('pattern-bg', PatternBg)
Vue.component('index-nav', IndexNav)
Vue.component('clip-img', ClipImg)
