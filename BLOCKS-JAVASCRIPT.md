# Sistema de Blocos - Estrutura de Arquivos JavaScript

## 📁 Estrutura dos Arquivos JS

### 🎯 Para o Editor (WordPress Admin)
- **`resources/js/blocks.js`** - APENAS para o editor do WordPress
  - Registra blocos usando APIs do Gutenberg (@wordpress/blocks)
  - Contém código que só funciona no contexto do editor
  - ⚠️ NUNCA importar no frontend (app.js)

### 🌐 Para o Frontend (Site público)
- **`resources/js/app.js`** - Script principal do frontend
  - Carregado em todas as páginas do site
  - Importa o blocks-frontend.js para funcionalidades dos blocos
  
- **`resources/js/blocks-frontend.js`** - Scripts de frontend dos blocos
  - JavaScript seguro para o frontend
  - Interatividade, animações, funcionalidades dos blocos
  - Não usa APIs específicas do WordPress/Gutenberg

### 🎨 Para o Editor (Estilos)
- **`resources/js/editor.js`** - Scripts específicos do editor
  - Funcionalidades adicionais para o editor
  - Pode usar APIs do WordPress

## 🚨 Problema Comum: "wp is not defined"

Este erro acontece quando:
- Código do editor (que usa `wp.*` APIs) é importado no frontend
- As APIs do Gutenberg não estão disponíveis no frontend

### ✅ Solução:
1. Manter `blocks.js` separado (apenas editor)
2. Usar `blocks-frontend.js` para funcionalidades do frontend
3. Importar `blocks-frontend.js` no `app.js`

## 📝 Como Adicionar Funcionalidades aos Blocos

### No Editor:
```javascript
// resources/js/blocks.js
import '../blocks/meu-bloco/block.jsx';
```

### No Frontend:
```javascript
// resources/js/blocks-frontend.js
document.addEventListener('DOMContentLoaded', function() {
    // Código para interação com blocos no frontend
});
```

## 🔄 Fluxo de Carregamento

1. **Editor**: `blocks.js` → Carregado apenas no admin
2. **Frontend**: `app.js` → `blocks-frontend.js` → Carregado no site

Essa separação garante que não haja conflitos entre editor e frontend.
