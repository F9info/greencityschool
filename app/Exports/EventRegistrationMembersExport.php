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

class EventRegistrationMembersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithTitle
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
            'Name',
            'Type',
            'Price',
            'Additional Field 1',
            'Additional Field 2',
        ];
    }

    public function map($eventRegistration): array
    {
        if ($eventRegistration->additional_fields != null && $eventRegistration->additional_fields != '[]') {
            foreach (json_decode($eventRegistration->additional_fields) as $field) {
                return [
                    $eventRegistration->id,
                    $field->name,
                    $field->type,
                    $field->price,
                    $field->field1,
                    $field->field2,
                ];
            }
        } else {
            return [];
        }
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
        return 'Event Registration Members';
    }
}
