/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'all',
  content: [
    "./resources/**/*.blade.php",
    "./resources/errors/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}