const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    "./resources/**/*.blade.php", // Définit les fichiers Blade PHP dans le répertoire resources
    "./resources/**/*.js", // Définit les fichiers JavaScript dans le répertoire resources
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php", // Définit les fichiers Blade PHP spécifiques pour la pagination de Laravel
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans], // Étend la famille de polices sans-serif avec Inter var et les polices sans-serif par défaut de Tailwind
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms')({
      strategy: 'class', // Utilise uniquement les classes pour la personnalisation des formulaires Tailwind
    }),
  ],
}
