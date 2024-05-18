/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./App/resources/src/**/*.{html,js,php,html}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

