<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'sku', 'short_description', 'description',
        'features', 'benefits', 'applications', 'package_contents', 'specifications', 'variants',
        'care_instructions', 'usage_notes', 'image', 'gallery', 'is_featured',
        'is_active', 'sort_order', 'seo_title', 'seo_description',
    ];

    protected $casts = [
        'features' => 'array',
        'benefits' => 'array',
        'applications' => 'array',
        'package_contents' => 'array',
        'specifications' => 'array',
        'variants' => 'array',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
