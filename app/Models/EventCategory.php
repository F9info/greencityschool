<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class EventCategory extends Model
{
    use Sortable;

    public $table = 'event_categories';

    public $sortable = [
        'name'
    ];

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static $rules = [
        'name' => 'required|unique:event_categories'
    ];

    public static $update_rules = [
        'name' => 'required'
    ];

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function activeEvents()
    {
        return $this->events()->where('publish', 1)->orderBy('position', 'asc');
    }

    public function currentYearEvents()
    {
        return $this->events()->whereYear('created_at', '=', now()->year);
    }

    public function monthYearWiseEvents($month, $year)
    {
        return $this->events()->whereMonth('created_at', $month)->whereYear('created_at', '=', $year);
    }
}
