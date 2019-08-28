window.onload = function () {
    const menuToggles = document.querySelectorAll('.can-toggle-menu');

    function toggleMainmenu() {
        let menu = document.querySelector('.main-menu');
        let background = document.querySelector('.background-fixed');
        let body = document.querySelector('body');
        menu.classList.toggle('run');
        body.classList.toggle('run');
        background.classList.toggle('run');
    }

    menuToggles.forEach((toggle) => {
        return toggle.addEventListener('click', function () {
            toggleMainmenu();
        });
    });

    const submenuToggles = document.querySelectorAll('.submenu .submenu-toggle');

    submenuToggles.forEach((toggle) => {
        toggle.addEventListener('click', function () {
            this.parentElement.classList.toggle('open');
        })
    });
};

