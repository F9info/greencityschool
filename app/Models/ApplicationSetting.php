<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationSetting extends Model
{
    public $table = 'application_settings';

    public $fillable = [
        'field_name',
        'slug',
        'input_type',
        'value',
        'category_id',
        'type',
        'options'
    ];

    protected $casts = [
        'field_name' => 'string',
        'slug' => 'string',
        'input_type' => 'string',
        'value' => 'string',
        'category_id' => 'integer',
        'type' => 'string',
        'options' => 'string'
    ];

    public static $rules = [
        'field_name' => 'required|unique:application_settings',
        'slug' => 'required|unique:application_settings',
        'input_type' => 'required'
    ];

    public static $update_rules = [
        'field_name' => 'required',
        'slug' => 'required',
        'input_type' => 'required'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
