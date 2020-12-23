export const state = () => ({
  api: false,
  showTags: false
})

export const actions = {
  async nuxtServerInit({ dispatch }) {
    await dispatch('getData')
  },
  async getData({ commit }) {
    const { data } = await this.$axios.get(`${process.env.CMS_URL}data`)
    commit('SET_DATA', data)
  }
}

export const mutations = {
  SET_DATA(state, theData) {
    state.api = theData
  }
}