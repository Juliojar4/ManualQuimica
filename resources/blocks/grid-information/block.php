<?php
// Server-side rendering for Grid Information block

// Debug
if (defined('WP_DEBUG') && WP_DEBUG) {
    error_log('Grid Information Block - Attributes: ' . print_r($attributes, true));
}

$cards = $attributes['cards'] ?? [
    [
        'title' => 'Card 1',
        'subtitle' => 'Subtitle for card 1',
        'imageId' => 0,
        'imageUrl' => '',
        'imageAlt' => ''
    ],
    [
        'title' => 'Card 2',
        'subtitle' => 'Subtitle for card 2',
        'imageId' => 0,
        'imageUrl' => '',
        'imageAlt' => ''
    ],
    [
        'title' => 'Card 3',
        'subtitle' => 'Subtitle for card 3',
        'imageId' => 0,
        'imageUrl' => '',
        'imageAlt' => ''
    ]
];

$block_data = [
    'cards' => $cards,
    'slug' => 'grid-information'
];

echo view('blocks.grid-information', $block_data)->render();