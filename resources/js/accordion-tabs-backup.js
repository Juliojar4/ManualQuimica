/**
 * Accordion with Dynamic Images
 * Funcionalidade para o bloco custom-tabs/acordeão
 */

document.addEventListener('DOMContentLoaded', function() {
    initAccordionTabs();
});

function initAccordionTabs() {
    const accordionContainers = document.querySelectorAll('.accordion-with-images-block');
    
    accordionContainers.forEach((container, containerIndex) => {
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
                
                console.log('🎯 Target elements:', {
                    targetContentId,
                    targetImageId,
                    targetContent: !!targetContent,
                    targetImage: !!targetImage,
                    icon: !!icon
                });
                
                const isCurrentlyOpen = targetContent && targetContent.style.maxHeight && targetContent.style.maxHeight !== '0px';
                
                 
                if (isCurrentlyOpen) {
                    // Fechar item atual
                     closeAccordionItem(targetContent, icon);
                } else {
                    // Fechar todos os outros itens
                     contents.forEach((content, contentIndex) => {
                        if (contentIndex !== index) {
                            const otherIcon = headers[contentIndex].querySelector('.accordion-icon');
                            closeAccordionItem(content, otherIcon);
                        }
                    });
                    
                    // Abrir item clicado
                    openAccordionItem(targetContent, icon);
                    
                    // Trocar imagem
                    switchToImage(index, images, indicator);
                }
            });
        });
        
        // Inicializar primeiro item como aberto
        if (headers.length > 0) {
             const firstContent = contents[0];
            const firstIcon = headers[0].querySelector('.accordion-icon');
            
            openAccordionItem(firstContent, firstIcon);
            switchToImage(0, images, indicator);
        }
    });
}

function openAccordionItem(content, icon) {
    if (!content) {
         return;
    }
    
    content.style.maxHeight = '24rem'; // 384px = 96 * 4
    content.classList.remove('max-h-0', 'opacity-0');
    content.classList.add('max-h-96', 'opacity-100');
    
    if (icon) {
        icon.style.transform = 'rotate(180deg)';
    }
    
 }

function closeAccordionItem(content, icon) {
    if (!content) {
         return;
    }
    
    content.style.maxHeight = '0px';
    content.classList.remove('max-h-96', 'opacity-100');
    content.classList.add('max-h-0', 'opacity-0');
    
    if (icon) {
        icon.style.transform = 'rotate(0deg)';
    }
    
 
}

function switchToImage(index, allImages, indicator) {
    // Esconder todas as imagens
    allImages.forEach((img) => {
        img.classList.remove('opacity-100');
        img.classList.add('opacity-0');
    });
    
    // Mostrar a imagem do índice selecionado
    if (allImages[index]) {
        setTimeout(() => {
            allImages[index].classList.remove('opacity-0');
            allImages[index].classList.add('opacity-100');
        }, 200);
    }
    
    // Atualizar indicador
    if (indicator) {
        indicator.textContent = `Item ${index + 1}`;
    }
}
