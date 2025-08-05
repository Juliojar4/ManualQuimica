import '../blocks/primary-cta/block.jsx';
import '../blocks/f-a-q/block.jsx';
import '../blocks/custom-tabs/block.jsx';
import '../blocks/scroll-component/block.jsx';
/**
 * Main file to register all custom blocks
 * 
 * ⚠️  IMPORTANTE: Este arquivo é APENAS para o EDITOR do WordPress
 * Não deve ser importado no app.js (frontend) pois usa APIs específicas do Gutenberg
 * 
 * Blocks will be automatically imported when created via:
 * lando wp acorn make:block block-name --with-js --with-css
 * or
 * wp acorn make:block block-name --with-js --with-css
 */

// Import global styles for blocks in editor
import '../css/blocks.css';

// Block imports will be automatically added here
import '../blocks/hero/block.jsx';
import '../blocks/grid-information/block.jsx';

console.log('🎨 Auto Blocks - System loaded!');