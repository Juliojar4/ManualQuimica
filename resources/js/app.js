/**
 * Main application file
 * This file is loaded on the website frontend
 */

// Import main CSS styles
import '../css/app.css';

// Import Splide for sliders
import { Splide } from '@splidejs/splide';
import '@splidejs/splide/css';

// Make Splide globally available
window.Splide = Splide;

// Import block frontend scripts (safe for frontend)
import './blocks-frontend';
import './aos';
import './mobile-menu';

// Your custom JavaScript code here
 
