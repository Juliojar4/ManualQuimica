/**
 * Frontend JavaScript for custom blocks
 * 
 * Este arquivo contém JavaScript que deve rodar no frontend do site
 * para funcionalidades interativas dos blocos customizados.
 * 
 * Diferente do blocks.js (que é apenas para o editor), este arquivo
 * é seguro para usar no frontend.
 */

// Import accordion tabs functionality
import './accordion-tabs';

 
// Scripts de frontend para blocos específicos
// Hero block - Animações das bolhas já estão no CSS
// Grid Information - Estático, não necessita JS
// Custom Tabs/Accordion - Funcionalidade importada acima

// Testemunhos Block - Splide Slider Initialization
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all testimonials sliders
    const testimonialSliders = document.querySelectorAll('.testemunhos-slider');
    
    testimonialSliders.forEach(slider => {
        if (typeof Splide !== 'undefined') {
            try {
                // Get configuration from data attribute
                const config = slider.getAttribute('data-splide');
                const options = config ? JSON.parse(config) : {
                    type: 'loop',
                    autoplay: true,
                    interval: 3000,
                    perPage: 3,
                    perMove: 1,
                    gap: '16px',
                    fixedWidth: '33.333%',
                    padding: 0,
                    pagination: true,
                    arrows: true,
                    breakpoints: {
                        1024: { 
                            perPage: 2, 
                            fixedWidth: '50%' 
                        },
                        768: { 
                            perPage: 1, 
                            fixedWidth: '100%',
                            gap: '8px'
                        }
                    }
                };

                // Initialize Splide
                const splide = new Splide(slider, options);
                
             
                splide.on('moved', function() {
                    // Add slight animation delay to prevent jarring effects
                    const slides = slider.querySelectorAll('.splide__slide');
                    slides.forEach((slide, index) => {
                        slide.style.transition = 'transform 0.3s ease';
                    });
                });

                // Mount the slider
                splide.mount();

                // Add hover pause functionality
                const track = slider.querySelector('.splide__track');
                if (track && options.autoplay) {
                    track.addEventListener('mouseenter', () => {
                        splide.Components.Autoplay.pause();
                    });
                    
                    track.addEventListener('mouseleave', () => {
                        splide.Components.Autoplay.play();
                    });
                }

            } catch (error) {
                console.error('Error initializing testemunhos slider:', error);
            }
        } else {
            console.warn('Splide library not found. Please ensure @splidejs/splide is properly loaded.');
        }
    });

    // Add enhanced hover effects for testimonial cards
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    testimonialCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            // Only change background color on hover - no scaling
            this.style.background = 'linear-gradient(135deg, #f8fafc, #e2e8f0)';
            this.style.transition = 'all 0.3s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.background = '#ffffff';
        });

        // Add focus accessibility
        card.addEventListener('focus', function() {
            this.style.outline = '2px solid #3b82f6';
            this.style.outlineOffset = '2px';
        });
        
        card.addEventListener('blur', function() {
            this.style.outline = '';
            this.style.outlineOffset = '';
        });
    });

    // Add smooth scroll behavior for navigation
    const splideArrows = document.querySelectorAll('.testemunhos-block .splide__arrow');
    splideArrows.forEach(arrow => {
        arrow.addEventListener('click', function() {
            // Add ripple effect
            const ripple = document.createElement('span');
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.6)';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s linear';
            ripple.style.left = '50%';
            ripple.style.top = '50%';
            ripple.style.width = '20px';
            ripple.style.height = '20px';
            ripple.style.marginLeft = '-10px';
            ripple.style.marginTop = '-10px';
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

// Add CSS for ripple animation if not already present
if (!document.querySelector('#testemunhos-ripple-styles')) {
    const style = document.createElement('style');
    style.id = 'testemunhos-ripple-styles';
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .testemunhos-block .splide__arrow {
            position: relative;
            overflow: hidden;
        }
    `;
    document.head.appendChild(style);
}