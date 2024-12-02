/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        bevietnam: ['"Be Vietnam Pro"', 'sans-serif'],
      },
      colors: {
        biru: '#0D92F4', // Biru agak gelap
        birumud:'#77CDFF', //Biru terang
        birucard:'#B7E0FF',
        putih:'#FBFBFB',
        oren:'#FFDDAE',
      },
    },
  },
  plugins: [],
}

