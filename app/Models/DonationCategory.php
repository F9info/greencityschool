<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class DonationCategory extends Model
{
    use Sortable;

    public $sortable = [
        'donation_cause',
    ];

    public $table = 'donation_categories';

    public $fillable = [
        'donation_cause'
    ];

    protected $casts = [
        'donation_cause' => 'string'
    ];

    public static $rules = [
        'donation_cause' => 'required'
    ];

    public function donations()
    {
        return $this->hasMany('App\Models\Donation');
    }

    public function currentYearDonations()
    {
        return $this->donations()->whereYear('created_at', '=', now()->year);
    }

    public function monthYearWiseDonations($month, $year)
    {
        return $this->donations()->whereMonth('created_at', $month)->whereYear('created_at', '=', $year);
    }
}
