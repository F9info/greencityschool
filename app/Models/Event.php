<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Event extends Model
{

    use Sortable;

    public $sortable = [
        'event_name',
        'start_date',
        'end_date',
    ];
    
    public $table = 'events';

    public $fillable = [
        'event_name',
        'slug',
        'event_category_id',
        'start_date',
        'end_date',
        'location',
        'city',
        'state',
        'zipcode',
        'contact_email',
        'image',
        'additional_fields',
        'reg_start_date',
        'reg_end_date',
        'guest_adult_amount',
        'guest_child_amount',
        'adult_amount',
        'child_amount',
        'event_description',
        'registration_note',
        'page_title',
        'meta_description',
        'meta_keywords',
        'top_line',
        'event_gallery'
    ];

    protected $casts = [
        'event_name' => 'string',
        'slug' => 'string',
        'event_category_id' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'location' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zipcode' => 'string',
        'contact_email' => 'string',
        'image' => 'string',
        'additional_fields' => 'array',
        'reg_start_date' => 'datetime',
        'reg_end_date' => 'datetime',
        'guest_adult_amount' => 'double',
        'guest_child_amount' => 'double',
        'adult_amount' => 'double',
        'child_amount' => 'double',
        'event_description' => 'string',
        'registration_note' => 'string',
        'page_title' => 'string',
        'meta_description' => 'string',
        'meta_keywords' => 'string',
        'top_line' => 'string',
        'event_gallery' => 'array',
    ];

    public static $rules = [
        'event_name' => 'required',
        'slug' => 'required',
        'event_category_id' => 'required',
    ];

    public function eventCategory()
    {
        return $this->belongsTo('App\Models\EventCategory', 'event_category_id');
    }

    public function eventRegistrations()
    {
        return $this->hasMany('App\Models\EventRegistration');
    }
}