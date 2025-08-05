/**
 * Accordion with Dynamic Images - Clean Version
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
    
    // Atualiza o indicador
    if (indicator) {
        indicator.textContent = `Item ${index + 1}`;
    }
}
