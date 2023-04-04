<?php

namespace App\Repositories;

use App\Models\PaymentMethod;
use App\Repositories\BaseRepository;

class PaymentMethodRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'payment_method_name',
        'sandbox_key',
        'sandbox_secret',
        'live_key',
        'live_secret'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return PaymentMethod::class;
    }
}
