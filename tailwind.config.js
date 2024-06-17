
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'media',
    theme: {
        container: {
            center: true,
            padding: '20px',
        },
        fontFamily: {
            'sans': ['Gilroy', 'sans-serif'],
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
    ],
}
