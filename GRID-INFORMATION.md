# 📊 Grid Information Block - Manual de Química

## ✨ Funcionalidades

### 🎯 **Visão Geral**
- **Grid responsivo** de 3 cards em desktop, 1 coluna em mobile
- **Cada card contém**: Imagem, Título e Subtítulo
- **Tema químico**: Cores e gradientes que combinam com o Manual de Química
- **Animações AOS**: Entrada suave com delays escalonados

### 🧩 **Estrutura do Card**
```
┌─────────────────────┐
│     IMAGEM (48h)    │
│   Placeholder: ⚗️   │
├─────────────────────┤
│     TÍTULO          │
│   (editável)        │
├─────────────────────┤
│    SUBTÍTULO        │
│   (editável)        │
└─────────────────────┘
```

## ⚙️ **Como Usar**

### **No Editor WordPress:**
1. Adicione o bloco "Grid Information"
2. **Edição direta**: Clique nos títulos/subtítulos para editar
3. **Painel lateral**: Clique em "Grid Information Settings" para configurar imagens
4. **Para cada card**: Expanda "Card 1", "Card 2", "Card 3" para selecionar imagens

### **Configuração de Imagens:**
- Clique em "Select Image" para adicionar
- "Replace Image" para trocar
- "Remove" para remover
- Preview automático no editor

## 🎨 **Design e Estilo**

### **Cores e Tema:**
- **Fundo geral**: Cinza claro (`bg-gray-50`)
- **Cards**: Fundo branco com shadow
- **Gradiente placeholder**: Teal para Cyan (tema químico)
- **Hover**: Título muda para teal, card se eleva

### **Responsividade:**
```css
/* Desktop */
grid-cols-3 (3 colunas)

/* Mobile */
grid-cols-1 (1 coluna)
```

### **Animações:**
- **AOS fade-up**: Entrada de baixo para cima
- **Delays**: 0ms, 100ms, 200ms (cards aparecem em sequência)
- **Hover**: Scale na imagem, elevação do card
- **Transições**: 300ms suaves

## 🔧 **Estrutura Técnica**

### **Atributos:**
```json
{
  "cards": [
    {
      "title": "string",
      "subtitle": "string", 
      "imageId": number,
      "imageUrl": "string",
      "imageAlt": "string"
    }
  ]
}
```

### **Arquivos:**
- **JSX**: `block.jsx` (editor)
- **PHP**: `block.php` (backend)
- **Blade**: `grid-information.blade.php` (frontend)
- **CSS**: `block.css` (estilos)
- **JSON**: `block.json` (configuração)

## 📱 **Compatibilidade**
- ✅ Responsivo (mobile-first)
- ✅ AOS Animations
- ✅ WordPress Gutenberg
- ✅ Tema químico consistente
- ✅ RichText editável
- ✅ Media Library integrada

## 🧪 **Placeholder Químico**
Quando não há imagem, aparece:
- **Ícone**: ⚗️ (tubo de ensaio)
- **Texto**: "Imagem do Card"
- **Fundo**: Gradiente teal/cyan
- **Tema**: Consistente com Manual de Química
