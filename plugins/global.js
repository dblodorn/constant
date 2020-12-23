import globals from '~/globals.json'

export default (context, inject) => {
  const global = {
    ...globals,
    nav: [
      'Artists',
      'Projects',
      'About'
    ]
  }
  inject('global', global)
  context.$global = global
}