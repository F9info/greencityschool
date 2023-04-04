<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Donation extends Model
{
    use Sortable;

    public $sortable = [
        'donation_cause',
    ];

    public $table = 'donations';

    public $fillable = [
        'donation_amount',
        'first_name',
        'last_name',
        'email',
        'phone_no',
        'address',
        'user_id',
        'donation_category_id',
        'donation_cause_other'
    ];

    protected $casts = [
        'donation_amount' => 'double',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone_no' => 'string',
        'address' => 'string',
        'user_id' => 'integer',
        'donation_category_id' => 'integer',
        'donation_cause_other' => 'string',
    ];

    public static $rules = [
        'donation_amount' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'donation_category_id' => 'required'
    ];

    public function donationCategory()
    {
        return $this->belongsTo('App\Models\DonationCategory');
    }

    public function transaction()
    {
        return $this->hasOne('App\Models\Transaction');
    }
}
