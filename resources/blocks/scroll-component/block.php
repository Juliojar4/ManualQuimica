<?php
// Server-side rendering for Scroll Component block

$content = $attributes['content'] ?? '';
$block_data = [
    'title' => 'Scroll Component',
    'content' => $content,
    'slug' => 'scroll-component'
];

echo view('blocks.scroll-component', $block_data)->render();