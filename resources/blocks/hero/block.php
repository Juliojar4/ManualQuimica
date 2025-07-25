<?php
// Server-side rendering for Hero block

$title = $attributes['title'] ?? 'Hero Title';
$description = $attributes['description'] ?? 'Your hero description goes here...';
$imageId = $attributes['imageId'] ?? 0;
$imageUrl = $attributes['imageUrl'] ?? '';
$imageAlt = $attributes['imageAlt'] ?? '';

$block_data = [
    'title' => $title,
    'description' => $description,
    'imageId' => $imageId,
    'imageUrl' => $imageUrl,
    'imageAlt' => $imageAlt,
    'slug' => 'hero'
];

echo view('blocks.hero', $block_data)->render();