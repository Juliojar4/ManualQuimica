/**
 * Simple Mobile Menu Controller
 */

document.addEventListener('DOMContentLoaded', function() {
    initMobileMenu();
});

function initMobileMenu() {
    const menuButton = document.getElementById('mobile-menu-button');
    const menuOverlay = document.getElementById('mobile-menu-overlay');
    const backdrop = document.getElementById('mobile-backdrop');
    
    if (!menuButton || !menuOverlay) return;
    
    let isMenuOpen = false;
    
    // Toggle menu on button click
    menuButton.addEventListener('click', toggleMenu);
    
    // Close menu on backdrop click
    if (backdrop) {
        backdrop.addEventListener('click', closeMenu);
    }
    
    // Close menu on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isMenuOpen) {
            closeMenu();
        }
    });
    
    function toggleMenu() {
        if (isMenuOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    }
    
    function openMenu() {
        isMenuOpen = true;
        menuButton.classList.add('active');
        menuOverlay.classList.add('active');
        document.body.classList.add('mobile-menu-open');
        menuButton.setAttribute('aria-expanded', 'true');
    }
    
    function closeMenu() {
        isMenuOpen = false;
        menuButton.classList.remove('active');
        menuOverlay.classList.remove('active');
        document.body.classList.remove('mobile-menu-open');
        menuButton.setAttribute('aria-expanded', 'false');
    }
}
