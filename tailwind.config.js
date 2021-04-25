module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      textColor: {
        'kmutt-or' : '#fa4616',
        'darkblue' : '#1a2744',
        'darkblue2' : '#008fff'
      },
      colors: {
        'kmutt-or' : '#fa4616',
        'kmutt-hover' : '#de3204',
        'darkblue' : '#1a2744',
        'darkblue2' : '#008fff'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
