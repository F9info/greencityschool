<?php

namespace App\Exports;

use App\Models\Donation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DonationsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
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
        return getDonations($this->request)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Last Name',
            'Email',
            'Phone no.',
            'Address',
            'Donation Cause',
            'Amount',
            'Payment Method',
            'Transaction Id',
            'Bank Name',
            'Cheque No',
            'Cheque Date',
            'Payment Status',
            'Donation Date'

        ];
    }

    public function map($donation): array
    {
        return [
            $donation->id,
            $donation->first_name,
            $donation->last_name,
            $donation->email,
            $donation->phone_no,
            $donation->address,
            $donation->donation_cause == "Other" ? $donation->donation_cause_other : $donation->donation_cause,
            formatAmount($donation->amount),
            $donation->payment_method_name,
            $donation->transaction_id,
            $donation->bank_name,
            $donation->cheque_no,
            formatDate($donation->cheque_date),
            $donation->payment_status,
            formatDate($donation->created_at),
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
}
