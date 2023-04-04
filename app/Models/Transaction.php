<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Transaction extends Model
{

    use Sortable;

    public $sortable = [
        'transaction_id',
        'amount',
        'transaction_date',
        'payment_status',
        'user_id',
    ];
    public $table = 'transactions';

    public $fillable = [
        'reference',
        'transaction_id',
        'amount',
        'transaction_date',
        'payment_method_id',
        'payment_status',
        'bank_name',
        'cheque_no',
        'cheque_date',
        'cheque_amount',
        'user_id',
        'event_id',
        'admin_comment',
        'user_comment'
    ];

    protected $casts = [
        'reference' => 'string',
        'transaction_id' => 'string',
        'amount' => 'double',
        'transaction_date' => 'date',
        'payment_method_id' => 'integer',
        'payment_status' => 'string',
        'bank_name' => 'string',
        'cheque_no' => 'string',
        'cheque_date' => 'string',
        'cheque_amount' => 'string',
        'user_id' => 'integer',
        'event_id' => 'integer',
        'admin_comment' => 'string',
        'user_comment' => 'string'
    ];

    public static $rules = [
        'reference' => 'required',
        'transaction_id' => 'required',
        'amount' => 'required',
        'transaction_date' => 'required',
        'payment_method_id' => 'required',
        'payment_status' => 'required'
    ];

    public function paymentMethod()
    {
        return $this->belongsTo('App\Models\PaymentMethod', 'payment_method_id');
    }

    public function eventRegistration()
    {
        return $this->belongsTo('App\Models\EventRegistration', 'event_registration_id');
    }
}
