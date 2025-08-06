/**
 * Accordion with Dynamic Images - Clean Version
 * Funcionalidade para o bloco custom-tabs/acordeão
 */

document.addEventListener('DOMContentLoaded', function() {
    initAccordionTabs();
    
    // Re-inicializa quando a tela é redimensionada
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            // Reset das animações após resize
            const allImages = document.querySelectorAll('.dynamic-image');
            allImages.forEach(img => {
                img.classList.remove('mobile-slide-enter', 'mobile-slide-enter-active', 'mobile-slide-exit', 'mobile-slide-exit-active');
            });
        }, 250);
    });
});

function initAccordionTabs() {
    const accordionContainers = document.querySelectorAll('.accordion-with-images-block');
    
    accordionContainers.forEach((container) => {
        const headers = container.querySelectorAll('.accordion-header');
        const contents = container.querySelectorAll('.accordion-content');
        const images = container.querySelectorAll('.dynamic-image');
        const indicator = container.querySelector('.current-indicator');
        
        headers.forEach((header, index) => {
            header.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetContentId = header.dataset.accordionTarget;
                const targetContent = document.getElementById(targetContentId);
                const icon = header.querySelector('.accordion-icon');
                
                const isCurrentlyOpen = targetContent && targetContent.classList.contains('open');
                
                if (isCurrentlyOpen) {
                    // Fecha o item atual
                    closeAccordionItem(targetContent, icon);
                } else {
                    // Fecha todos os outros itens primeiro
                    contents.forEach((content, contentIndex) => {
                        if (contentIndex !== index) {
                            const otherIcon = headers[contentIndex].querySelector('.accordion-icon');
                            closeAccordionItem(content, otherIcon);
                        }
                    });
                    
                    // Abre o item clicado
                    openAccordionItem(targetContent, icon);
                    
                    // Troca a imagem
                    switchToImage(index, images, indicator);
                }
            });
        });
        
        // Inicializa o primeiro item como aberto
        if (headers.length > 0) {
            const firstContent = contents[0];
            const firstIcon = headers[0].querySelector('.accordion-icon');
            
            openAccordionItem(firstContent, firstIcon);
            switchToImage(0, images, indicator);
        }
    });
}

function openAccordionItem(contentElement, iconElement) {
    if (!contentElement) return;
    
    contentElement.classList.add('open');
    contentElement.classList.remove('max-h-0', 'opacity-0');
    contentElement.classList.add('max-h-96', 'opacity-100');
    contentElement.style.maxHeight = contentElement.scrollHeight + 'px';
    
    if (iconElement) {
        iconElement.style.transform = 'rotate(180deg)';
    }
}

function closeAccordionItem(contentElement, iconElement) {
    if (!contentElement) return;
    
    contentElement.classList.remove('open', 'max-h-96', 'opacity-100');
    contentElement.classList.add('max-h-0', 'opacity-0');
    contentElement.style.maxHeight = '0';
    
    if (iconElement) {
        iconElement.style.transform = 'rotate(0deg)';
    }
}

function switchToImage(index, allImages, indicator) {
    const isMobile = window.innerWidth <= 1024;
    
    if (isMobile) {
        // Animação específica para mobile
        switchToImageMobile(index, allImages);
    } else {
        // Animação para desktop (mantém a atual)
        switchToImageDesktop(index, allImages);
    }
    
    // Atualiza o indicador
    if (indicator) {
        indicator.textContent = `Item ${index + 1}`;
    }
}

function switchToImageDesktop(index, allImages) {
    // Esconde todas as imagens
    allImages.forEach((img) => {
        img.classList.remove('opacity-100');
        img.classList.add('opacity-0');
    });
    
    // Mostra a imagem do índice selecionado
    if (allImages[index]) {
        setTimeout(() => {
            allImages[index].classList.remove('opacity-0');
            allImages[index].classList.add('opacity-100');
        }, 200);
    }
}

function switchToImageMobile(index, allImages) {
    // Encontra a imagem atual e a próxima
    const currentImage = Array.from(allImages).find(img => img.classList.contains('opacity-100'));
    const nextImage = allImages[index];
    
    if (!nextImage || currentImage === nextImage) return;
    
    // Remove classes de animação anteriores
    allImages.forEach(img => {
        img.classList.remove('mobile-slide-enter', 'mobile-slide-enter-active', 'mobile-slide-exit', 'mobile-slide-exit-active');
    });
    
    // Anima saída da imagem atual
    if (currentImage) {
        currentImage.classList.add('mobile-slide-exit');
        
        setTimeout(() => {
            currentImage.classList.add('mobile-slide-exit-active');
            currentImage.classList.remove('opacity-100');
            currentImage.classList.add('opacity-0');
        }, 50);
    }
    
    // Anima entrada da nova imagem
    setTimeout(() => {
        nextImage.classList.remove('opacity-0');
        nextImage.classList.add('opacity-100', 'mobile-slide-enter');
        
        setTimeout(() => {
            nextImage.classList.add('mobile-slide-enter-active');
            nextImage.classList.remove('mobile-slide-enter');
        }, 50);
        
        // Limpa classes após animação
        setTimeout(() => {
            nextImage.classList.remove('mobile-slide-enter-active');
            if (currentImage) {
                currentImage.classList.remove('mobile-slide-exit', 'mobile-slide-exit-active');
            }
        }, 600);
        
    }, currentImage ? 200 : 0);
}
