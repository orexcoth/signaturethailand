<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\sellsModel;
use App\Models\preordersModel;
use App\Models\preorders_signsModel;
use App\Models\downloadsModel;

class SellsExport implements FromCollection, WithHeadings
{
    protected $results;
    protected $status;

    public function __construct($results, $status)
    {
        $this->results = $results;
        $this->status = $status;
    }

    public function collection()
    {
        return $this->results;
    }

    public function headings(): array
    {
        // Get the column names from the sellsModel
        $columns = array_keys($this->results->first()->toArray());

        // Use the column names as headers
        return $columns;
    }
}
