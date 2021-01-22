export const state = () => ({
  api: false,
  showTags: false,
  patternIndex: 0,
  bottomIndex: 0,
})

export const actions = {
  async nuxtServerInit({ dispatch }) {
    await dispatch('getData')
  },
  async getData({ commit, dispatch }) {
    const { data } = await this.$axios.get(`${process.env.CMS_URL}data`)
    commit('SET_DATA', data)
  }
}

export const mutations = {
  SET_DATA(state, theData) {
    state.api = theData
  },
  SET_PATTERN(state) {
    let index = 0
    const getRandomInt = (max) =>
      Math.floor(Math.random() * Math.floor(max))
    if (state.api) {
      const amount = state.api.options.bg_patterns.length
      index = getRandomInt(amount)
    }
    state.patternIndex = index
  },
  SET_BOTTOM_PATTERN(state) {
    let index = 0
    const getRandomInt = (max) =>
      Math.floor(Math.random() * Math.floor(max))
    if (state.api) {
      const amount = state.api.options.bottom_layer_patterns.length
      index = getRandomInt(amount)
    }
    state.bottomIndex = index
  }
}