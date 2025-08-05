<?php
// Server-side rendering for Faq block

$content = $attributes['content'] ?? '';
$block_data = [
    'title' => 'Faq',
    'content' => $content,
    'slug' => 'f-a-q'
];

echo view('blocks.f-a-q', $block_data)->render();