<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\BaseRepository;

class TransactionRepository extends BaseRepository
{
    protected $fieldSearchable = [
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

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Transaction::class;
    }
}
