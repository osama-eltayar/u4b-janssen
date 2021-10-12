<?php

namespace App\Exports;

use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class GamesExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    private $query;

    public function __construct($query)
    {

        $this->query = $query;
    }

    public function query()
    {
        return $this->query;
    }

    public function headings(): array
    {
        return [
            'name','email','Region','score','Duration','Date Time'
        ];
    }

    public function map($row): array
    {
        $remainingDuration =  300 - $row->remainingDuration ;
        $remainingMinutes = $remainingDuration/60;
        return [
            $row->name,
            $row->email,
            optional($row->country)->name,
            $row->score. ' / 12',
            (int)$remainingMinutes .':'.$remainingDuration%60,
            $row->created_at,
        ];
    }
}
