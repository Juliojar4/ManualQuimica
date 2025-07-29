# 🧪 Botão com Animação Química - Hero Block

## ✨ Funcionalidades Implementadas

### 🎨 **Design do Botão**
- **Cor do texto**: Cinza escuro (`text-gray-800`) para melhor legibilidade
- **Gradiente**: De teal para cyan (`from-teal-500 to-cyan-600`)
- **Hover**: Gradiente mais escuro (`hover:from-teal-600 hover:to-cyan-700`)
- **Removido**: Animação de "levantada" no hover

### 🫧 **Animação de Bolhas Químicas**
- **5 bolhas diferentes** com tamanhos e timing únicos
- **Movimento realista**: Sobem de baixo para cima com movimento lateral
- **Opacidade dinâmica**: Aparecem, se intensificam e desaparecem
- **Scaling**: Começam pequenas, crescem no meio e diminuem no final
- **Trigger**: Ativada apenas no hover do botão

### ⚙️ **Controles no Editor**
- **Toggle**: Mostrar/ocultar botão
- **Texto**: Personalizável (padrão: "Começar a Aprender")
- **URL**: Configurável (padrão: "#conteudo")
- **Preview**: Visualização no editor com simulação das bolhas

## 🔧 **Como Usar**

### No Editor WordPress:
1. Adicione o bloco Hero
2. Vá para "Button Settings" na barra lateral
3. Configure:
   - ✅ Show Button (ativar/desativar)
   - 📝 Button Text (texto do botão)
   - 🔗 Button URL (link de destino)

### No Frontend:
- O botão aparece com gradiente teal/cyan
- Texto em cinza escuro para contraste
- No hover: bolhas químicas sobem como líquido fervendo
- Animação suave e realista

## 🧪 **Detalhes da Animação**

### Timing das Bolhas:
- **Bolha 1**: 2.1s, delay 0s
- **Bolha 2**: 1.8s, delay 0.3s  
- **Bolha 3**: 2.3s, delay 0.6s
- **Bolha 4**: 2.0s, delay 0.9s
- **Bolha 5**: 1.9s, delay 1.2s

### Efeito Visual:
- Começam invisíveis na parte inferior
- Sobem com movimento serpenteante
- Mudam de tamanho durante a subida
- Desaparecem no topo
- Cor: Branco translúcido (30% opacidade)

## 🎯 **Compatibilidade**
- ✅ Responsivo
- ✅ AOS Animation (fade-up com delay)
- ✅ Tailwind CSS
- ✅ Hover states
- ✅ Acessibilidade mantida
