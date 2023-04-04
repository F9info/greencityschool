<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationDetail extends Model
{
    use HasFactory;
    public $table = 'communication_details';

    public $fillable = [
        'user_id',
        'facebook',
        'twitter',
        'instagram',
        'whatsapp',
        'email',
        'terms_and_conditions'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
