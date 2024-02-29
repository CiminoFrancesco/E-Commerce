(() => {
    'use strict';

    const darkTheme = 'dark';

    const setTheme = () => {
        document.documentElement.setAttribute('data-bs-theme', darkTheme);
    };

    window.addEventListener('DOMContentLoaded', () => {
        setTheme();
    });
})();
