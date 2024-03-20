<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\LuckyWheel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LuckyWheelExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return LuckyWheel::all();
    // }
    public $fromDate;
    public $toDate;
    public $index;

    public function __construct($fromDate = null, $toDate = null)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }
    public function searchableDownload()
    {
        $query = LuckyWheel::query();
        if ($this->fromDate && !$this->toDate) {
            $query->whereBetween('created_at', [$this->fromDate, Carbon::now()]);
        } elseif (!$this->fromDate && $this->toDate) {

            $query->whereBetween('created_at', ['1900-01-01', Carbon::parse($this->toDate)->addDay()]);
        } elseif ($this->fromDate && $this->toDate) {

            $query->whereBetween('created_at', [Carbon::parse($this->fromDate), Carbon::parse($this->toDate)->addDay()]);
        }
        return $query->latest();
    }
    public function query()
    {
        return $this->searchableDownload();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Discount',
            'Number',
            'Date',
        ];
    }

    public function map($contact): array
    {

        return [
            [
                ++$this->index,
                $contact->name,
                $contact->discount,
                $contact->phone,
                $contact->created_at->format('D, d-m-Y'),

            ],


        ];
    }
}
