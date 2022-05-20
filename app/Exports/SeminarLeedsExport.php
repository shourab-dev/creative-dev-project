<?php

namespace App\Exports;

use App\Models\SeminarLeed;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class SeminarLeedsExport implements FromQuery, ShouldAutoSize, WithHeadings
{
    public $seminarId;
    public $name;
    public function __construct($seminarId)
    {
        $this->seminarId = $seminarId;
    }


    public function query()
    {
        return SeminarLeed::query()->where('seminar_id', $this->seminarId);
    }


    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Number',
            'Address',
        ];
    }
}
