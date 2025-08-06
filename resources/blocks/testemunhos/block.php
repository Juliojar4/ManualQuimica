<?php
// Server-side rendering for Testemunhos block

$testimonials = $attributes['testimonials'] ?? [];

// Preparar dados dos testemunhos
$prepared_testimonials = [];
foreach ($testimonials as $testimonial) {
    $prepared_testimonials[] = [
        'content' => wp_kses_post($testimonial['content'] ?? ''),
        'authorName' => sanitize_text_field($testimonial['authorName'] ?? ''),
        'authorSurname' => sanitize_text_field($testimonial['authorSurname'] ?? ''),
        'authorInitials' => strtoupper(sanitize_text_field($testimonial['authorInitials'] ?? '')),
        'rating' => intval($testimonial['rating'] ?? 5)
    ];
}

$block_data = [
    'testimonials' => $prepared_testimonials,
    'slug' => 'testemunhos'
];

echo view('blocks.testemunhos', $block_data)->render();