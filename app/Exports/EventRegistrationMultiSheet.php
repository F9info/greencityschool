<?php

namespace App\Exports;

use App\Models\EventRegistration;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EventRegistrationMultiSheet implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function sheets(): array
    {
        return [
            new EventRegistratoinsExport($this->request),
            new EventRegistrationMembersExport($this->request),
        ];
    }
}
