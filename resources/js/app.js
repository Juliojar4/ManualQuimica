/**
 * Main application file
 * This file is loaded on the website frontend
 */

// Import main CSS styles
import '../css/app.css';

// Import block JavaScript for frontend
import './blocks';

// Debug console logs
console.log('%c🎨 App.js loaded successfully!', 'color: #4CAF50; font-size: 16px; font-weight: bold;');
console.log('Current URL:', window.location.href);
console.log('Document ready state:', document.readyState);

// Import and initialize AOS
import AOS from 'aos';
import 'aos/dist/aos.css';

// Initialize AOS when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('%c🎯 DOM loaded, initializing AOS...', 'color: #2196F3; font-size: 14px;');
    
    AOS.init({
        duration: 800,
        offset: 100,
        once: true,
        easing: 'ease-out'
    });
    
    console.log('%c✅ AOS initialized successfully!', 'color: #FF9800; font-size: 14px;');
});
