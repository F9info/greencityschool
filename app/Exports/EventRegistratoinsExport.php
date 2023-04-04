<?php

namespace App\Exports;

use App\Models\EventRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class EventRegistratoinsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        return getEventRegistrationDetails($this->request)->get();
    }

    public function headings(): array
    {
        return [
            'Registration ID',
            'Event Name',
            'First Name',
            'Last Name',
            'Email',
            'City',
            'State',
            'Phone',
            'Adult Count',
            'Child Count',
            'Guest Adult Count',
            'Guest Child Count',
            'Amount Paid',
            'Payment Status',
            'Member ID',
            'Registered Date'

        ];
    }

    public function map($eventRegistration): array
    {
        return [
            $eventRegistration->id,
            $eventRegistration->event->event_name,
            $eventRegistration->first_name,
            $eventRegistration->last_name,
            $eventRegistration->email,
            $eventRegistration->city,
            $eventRegistration->state,
            $eventRegistration->phone,
            $eventRegistration->adult_count,
            $eventRegistration->child_count,
            $eventRegistration->guest_adult_count,
            $eventRegistration->guest_child_count,
            $eventRegistration->total_amount,
            $eventRegistration->transaction != null ? $eventRegistration->transaction->payment_status : null,
            $eventRegistration->user_id,
            formatDate($eventRegistration->created_at),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => [
                'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  15,
                    'bold'      =>  true,
                    'color' => ['argb' => 'EB2B02'],
                )
            ],
        ];
    }

    public function title(): string
    {
        return 'Event Registrations';
    }
}
