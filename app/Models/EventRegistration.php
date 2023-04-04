<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EventRegistration extends Model
{

    use Sortable;

    public $sortable = [
        'id',
        'first_name',
        'last_name',
        'created_at'
    ];

    public $table = 'event_registrations';

    public $fillable = [
        'event_id',
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'state',
        'city',
        'zipcode',
        'adult_count',
        'child_count',
        'guest_adult_count',
        'guest_child_count',
        'total_amount',
        'additional_fields'
    ];

    protected $casts = [
        'event_id' => 'integer',
        'user_id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'state' => 'string',
        'city' => 'string',
        'zipcode' => 'string',
        'adult_count' => 'integer',
        'child_count' => 'integer',
        'guest_adult_count' => 'integer',
        'guest_child_count' => 'integer',
        'total_amount' => 'double',
        'additional_fields' => 'string'
    ];

    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'state' => 'required',
        'city' => 'required',
        'zipcode' => 'required'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event', 'event_id');
    }

    public function transaction()
    {
        return $this->hasOne('App\Models\Transaction');
    }
}
