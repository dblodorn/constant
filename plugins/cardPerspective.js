import Vue from 'vue'

export default (context, inject) => {
  const cardPerspective = (store, x, y, scale) => {
    const xRange = (x !== undefined) ? parseFloat(x) : 20
    const yRange = (y !== undefined) ? parseFloat(y) : 20
    const ax = -(store.state.screen.width / 2 - store.state.screen.mouseX) / xRange
    const ay = (store.state.screen.height / 2 - store.state.screen.mouseY) / yRange
    return {
      transform: `rotateY(${ax}deg) rotateX(${ay}deg) scale(${scale !== undefined ? parseFloat(scale) : 1})`
    }
  }
  inject('cardPerspective', cardPerspective)
  context.$cardPerspective = cardPerspective
}
