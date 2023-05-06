<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $table = 'services';

    public $fillable = [
        'service_category_id',
        'title',
        'slug',
        'sub_title',
        'icon',
        'image',
        'image_alt_text',
        'short_description',
        'description',
        'custom_url',
        'new_window',
        'gallery',
        'video_url',
        'video_iframe',
        'page_title',
        'seo_title',
        'seo_keywords',
        'seo_description'
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'sub_title' => 'string',
        'icon' => 'string',
        'image' => 'string',
        'image_alt_text' => 'string',
        'short_description' => 'string',
        'description' => 'string',
        'custom_url' => 'string',
        'new_window' => 'boolean',
        'gallery' => 'array',
        'video_url' => 'string',
        'video_iframe' => 'string',
        'page_title' => 'string',
        'seo_title' => 'string',
        'seo_keywords' => 'string',
        'seo_description' => 'string'
    ];

    public static $rules = [
        'service_category_id' => 'required',
        'title' => 'required',
        // 'slug' => 'nullable|string|max:255',
        // 'sub_title' => 'nullable|string|max:255',
        // 'icon' => 'nullable|string|max:255',
        // 'image' => 'nullable|string|max:255',
        // 'image_alt_text' => 'nullable|string|max:255',
        // 'short_description' => 'nullable|string|max:65535',
        // 'description' => 'nullable|string|max:65535',
        // 'custom_url' => 'nullable|string|max:255',
        // 'new_window' => 'nullable|boolean',
        // 'gallery' => 'nullable|array|max:65535',
        // 'video_url' => 'nullable|string|max:255',
        // 'video_iframe' => 'nullable|string|max:65535',
        // 'page_title' => 'nullable|string|max:65535',
        // 'seo_title' => 'nullable|string|max:65535',
        // 'seo_keywords' => 'nullable|string|max:65535',
        // 'seo_description' => 'nullable|string|max:65535',
        // 'created_at' => 'nullable',
        // 'updated_at' => 'nullable'
    ];

    public function serviceCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\ServiceCategory::class, 'service_category_id');
    }
}
