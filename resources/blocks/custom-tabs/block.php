<?php
// Server-side rendering for Custom Tabs (Accordion) block

$accordionItems = $attributes['accordionItems'] ?? [
    [
        'title' => 'Primeira Seção',
        'content' => 'Conteúdo da primeira seção do acordeão...',
        'imageId' => 0,
        'imageUrl' => '',
        'imageAlt' => ''
    ],
    [
        'title' => 'Segunda Seção',
        'content' => 'Conteúdo da segunda seção do acordeão...',
        'imageId' => 0,
        'imageUrl' => '',
        'imageAlt' => ''
    ],
    [
        'title' => 'Terceira Seção',
        'content' => 'Conteúdo da terceira seção do acordeão...',
        'imageId' => 0,
        'imageUrl' => '',
        'imageAlt' => ''
    ]
];

$block_data = [
    'accordionItems' => $accordionItems,
    'slug' => 'custom-tabs'
];

echo view('blocks.custom-tabs', $block_data)->render();