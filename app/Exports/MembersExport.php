<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MembersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
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
        return getMemberDetails($this->request)->get();
    }

    public function headings(): array
    {
        return [
            'Member ID',
            'Email',
            'First Name',
            'Last Name',
            'Phone no.',
            'Address',
            'State',
            'City',
            'Zip code',
            'Native State',
            'Native District',
            'Native City',
            'Spouse First Name',
            'Spouse Last Name',
            'Spouse Native State',
            'Spouse Native District',
            'Spouse Native City',
            'Child Details',
            'Member Year',
            'Member Volunteer',
            'Spouse Volunteer',
            'Child Volunteer',
            'Amount',
            'Transaction Id',
            'Payment Method',
            'Payment Status',
            'Admin Comment',
            'User Comment',
            'Transaction Date',
            'Expiry Date',
            'Bank Name',
            'Cheque No',
            'Cheque Date',
            'Registered Date',
            'Membership Type'

        ];
    }

    public function map($personalDetail): array
    {
        return [
            $personalDetail->user_id,
            $personalDetail->email,
            $personalDetail->first_name,
            $personalDetail->last_name,
            $personalDetail->phone_no,
            $personalDetail->address,
            $personalDetail->state,
            $personalDetail->city,
            $personalDetail->zipcode,
            $personalDetail->native_state,
            $personalDetail->native_district,
            $personalDetail->native_city,
            $personalDetail->spouse_first_name,
            $personalDetail->spouse_last_name,
            $personalDetail->spouse_native_state,
            $personalDetail->spouse_native_district,
            $personalDetail->spouse_native_city,
            getUserChildrenDetails($personalDetail->user_id),
            getYearFromDate($personalDetail->expiry_date),
            memberInterestNames($personalDetail->member_interests),
            memberInterestNames($personalDetail->spouse_interests),
            memberInterestNames($personalDetail->child_interests),
            $personalDetail->amount,
            $personalDetail->transaction_id,
            $personalDetail->payment_method_name,
            $personalDetail->payment_status,
            $personalDetail->admin_comment,
            $personalDetail->user_comment,
            $personalDetail->transaction_date,
            $personalDetail->expiry_date,
            $personalDetail->bank_name,
            $personalDetail->cheque_no,
            $personalDetail->cheque_date,
            $personalDetail->created_at,
            $personalDetail->membership_name,
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
