<?php
// Server-side rendering for Primary CTA block

$title = $attributes['title'] ?? 'Compre Agora!';
$subtitle = $attributes['subtitle'] ?? 'Adquira nosso produto especial com desconto exclusivo';
$imageId = $attributes['imageId'] ?? 0;
$imageUrl = $attributes['imageUrl'] ?? '';
$imageAlt = $attributes['imageAlt'] ?? '';
$productId = $attributes['productId'] ?? 61;

// Debug para verificar se dados estão sendo passados
error_log('Primary CTA Block - Attributes: ' . print_r($attributes, true));

$block_data = [
    'title' => $title,
    'subtitle' => $subtitle,
    'imageId' => $imageId,
    'imageUrl' => $imageUrl,
    'imageAlt' => $imageAlt,
    'productId' => $productId,
    'slug' => 'primary-cta'
];

echo view('blocks.primary-cta', $block_data)->render();