/** @type {import('tailwindcss').Config} */
module.exports = {
  //tout les fichiers php/html/js + sousdossier
    content: ['./*.{php, html, js}', './components/*.{php, html, js}', './assets/script/*.js'],
  theme: {
    extend: {},
  },
  plugins: [],
}

