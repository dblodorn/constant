<template>
  <div>
    <raw-displayer :value="data.options.layout"></raw-displayer>
  </div>
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
      title: `${process.env.APP_TITLE}`,
      meta: [
        { hid: 'description', name: 'description', content: 'My custom description' },
        { hid: 'image', name: 'image', content: `${process.env.BASE_URL}/imgs/derpy-avatar-circle.png` },
      ]
    }
  }
}
</script>
