<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ReportExport implements FromCollection , WithHeadings
{
    private $data;

    public function __construct(Collection $data, array $customHeadings = [])
    {
        $this->data = $data;
        $this->customHeadings = $customHeadings;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        
            return $this->customHeadings;
        
    }


}
