<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static $rules = [
        'name' => 'required|unique:categories'
    ];

    public static $update_rules = [
        'name' => 'required'
    ];

    public function settings(){
        return $this->hasMany('App\Models\ApplicationSetting');
    }

    
}
