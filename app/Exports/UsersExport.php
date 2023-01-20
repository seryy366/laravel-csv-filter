<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ['Идентификатор', 'Название', 'Просмотры'];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Item::select('id','name', 'show_count')->get();
    }
}
