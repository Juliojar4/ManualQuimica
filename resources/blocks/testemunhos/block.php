<?php
// Server-side rendering for Testemunhos block

$testimonials = $attributes['testimonials'] ?? [
    [
        'id' => 1,
        'name' => 'Julio Jara',
        'initials' => 'JJ',
        'testimonial' => 'Excelente serviço! Recomendo para todos que procuram qualidade e profissionalismo.',
        'rating' => 5,
        'image' => ''
    ]
];

$backgroundColor = $attributes['backgroundColor'] ?? '#ffffff';
$textColor = $attributes['textColor'] ?? '#374151';
$accentColor = $attributes['accentColor'] ?? '#3b82f6';
$showRating = $attributes['showRating'] ?? true;
$autoplay = $attributes['autoplay'] ?? true;
$autoplaySpeed = $attributes['autoplaySpeed'] ?? 3000;

$block_data = [
    'testimonials' => $testimonials,
    'backgroundColor' => $backgroundColor,
    'textColor' => $textColor,
    'accentColor' => $accentColor,
    'showRating' => $showRating,
    'autoplay' => $autoplay,
    'autoplaySpeed' => $autoplaySpeed,
    'blockId' => 'testemunhos-' . wp_generate_uuid4()
];

echo view('blocks.testemunhos', $block_data)->render();