<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    public $table = 'service_categories';

    public $fillable = [
        'name',
        'display_name',
        'image',
        'image_alt_text',
        'icon',
        'description',
        'tagline'
    ];

    protected $casts = [
        'name' => 'string',
        'display_name' => 'string',
        'image' => 'string',
        'image_alt_text' => 'string',
        'icon' => 'string',
        'description' => 'string',
        'tagline' => 'string'
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'display_name' => 'nullable|string|max:255',
    ];

    public function services(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Service::class, 'service_category_id');
    }
}
