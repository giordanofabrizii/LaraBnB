import './bootstrap';

import '@fortawesome/fontawesome-free/js/all.min.js';

document.addEventListener('DOMContentLoaded', function() {
    const app = document.getElementById('app');
    const body = document.getElementsByTagName('body')[0];
    const darkModeEl = document.getElementById('dark-mode');

    /**
     * Switch between dark mode and light mode
     *
     */
    function toggleDarkMode() {
        if (app.classList.contains('dark')) {
            app.classList.remove('dark');
            body.classList.remove('dark');
            darkModeEl.innerHTML = 'Dark Mode';

            // save the theme
            localStorage.setItem('theme', 'light');
        } else {
            app.classList.add('dark');
            body.classList.add('dark');
            darkModeEl.innerHTML = 'Light Mode';

            localStorage.setItem('theme', 'dark');
        }
    }

    // event listner for the button
    darkModeEl.addEventListener('click', toggleDarkMode);

    // when the page is loaded, check the saved theme
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'dark') {
        app.classList.add('dark');
        body.classList.add('dark');
        darkModeEl.innerHTML = 'Light Mode';
    } else {
        darkModeEl.innerHTML = 'Dark Mode';
    }
});
