<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public $table = 'payment_methods';

    public $fillable = [
        'payment_method_name',
        'display_name',
        'slug',
        'sandbox_key',
        'sandbox_secret',
        'live_key',
        'live_secret'
    ];

    protected $casts = [
        'payment_method_name' => 'string',
        'display_name' => 'string',
        'slug' => 'string',
        'sandbox_key' => 'string',
        'sandbox_secret' => 'string',
        'live_key' => 'string',
        'live_secret' => 'string'
    ];

    public static $rules = [
        'payment_method_name' => 'required',
        'display_name' => 'required',
        'slug' => 'required'
    ];

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'payment_method_id');
    }
    
}
