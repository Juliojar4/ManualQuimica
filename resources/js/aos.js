import AOS from 'aos';

// Initialize AOS when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        mirror: false,
        anchorPlacement: 'top-bottom'
    });
    console.log('🎨 AOS initialized!');
});
