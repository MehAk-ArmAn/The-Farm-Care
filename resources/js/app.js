import './bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;
Alpine.start();
window.Swal = Swal;

/*
|--------------------------------------------------------------------------
| Small UI helpers for The Farm Care
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('[data-navbar]');

    if (navbar) {
        const handleNavbarShadow = () => {
            if (window.scrollY > 12) {
                navbar.classList.add('shadow-md');
            } else {
                navbar.classList.remove('shadow-md');
            }
        };

        handleNavbarShadow();
        window.addEventListener('scroll', handleNavbarShadow);
    }
});
