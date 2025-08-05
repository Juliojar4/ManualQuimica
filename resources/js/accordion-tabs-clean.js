/**
 * Accordion with Dynamic Images - Production Version
 * Funcionalidade para o bloco custom-tabs/acordeão
 */

document.addEventListener('DOMContentLoaded', function() {
    initAccordionTabs();
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
                
                // Toggle do item atual
                const targetContentId = header.dataset.accordionTarget;
                const targetImageId = header.dataset.imageTarget;
                const targetContent = document.getElementById(targetContentId);
                const targetImage = document.getElementById(targetImageId);
                const icon = header.querySelector('.accordion-icon');
                
                const isCurrentlyOpen = targetContent && targetContent.classList.contains('open');
                
                if (isCurrentlyOpen) {
                    // Fecha o item atual
                    closeAccordionItem(targetContent, icon);
                } else {
                    // Abre o item e fecha os outros
                    // Fecha todos os outros itens primeiro
                    contents.forEach((content, contentIndex) => {
                        if (contentIndex !== index) {
                            const otherIcon = headers[contentIndex].querySelector('.accordion-icon');
                            closeAccordionItem(content, otherIcon);
                        }
                    });
                    
                    // Abre o item clicado
                    openAccordionItem(targetContent, icon);
                    
                    // Troca a imagem com animação
                    switchToImage(images, targetImage, index, indicator);
                }
            });
        });
        
        // Abre o primeiro item por padrão
        if (headers.length > 0) {
            const firstContent = document.getElementById(headers[0].dataset.accordionTarget);
            const firstIcon = headers[0].querySelector('.accordion-icon');
            const firstImage = document.getElementById(headers[0].dataset.imageTarget);
            
            openAccordionItem(firstContent, firstIcon);
            switchToImage(images, firstImage, 0, indicator);
        }
    });
}

function openAccordionItem(contentElement, iconElement) {
    if (!contentElement) return;
    
    contentElement.classList.remove('max-h-0', 'opacity-0');
    contentElement.classList.add('open', 'max-h-screen', 'opacity-100');
    contentElement.style.maxHeight = contentElement.scrollHeight + 'px';
    
    if (iconElement) {
        iconElement.style.transform = 'rotate(180deg)';
    }
}

function closeAccordionItem(contentElement, iconElement) {
    if (!contentElement) return;
    
    contentElement.classList.remove('open', 'max-h-screen', 'opacity-100');
    contentElement.classList.add('max-h-0', 'opacity-0');
    contentElement.style.maxHeight = '0';
    
    if (iconElement) {
        iconElement.style.transform = 'rotate(0deg)';
    }
}

function switchToImage(allImages, targetImage, index, indicator) {
    // Primeiro, fechar todas as imagens com clip-path
    allImages.forEach((img) => {
        img.classList.remove('opacity-100');
        img.classList.add('opacity-0');
    });
    
    // Pequeno delay e depois abrir a imagem alvo
    setTimeout(() => {
        if (targetImage) {
            targetImage.classList.remove('opacity-0');
            targetImage.classList.add('opacity-100');
        }
    }, 200);
    
    // Atualizar indicador
    if (indicator) {
        indicator.textContent = `Item ${index + 1}`;
    }
}
