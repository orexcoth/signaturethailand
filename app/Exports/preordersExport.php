<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Schema;

use App\Models\sellsModel;
use App\Models\preordersModel;
use App\Models\preorders_signsModel;
use App\Models\downloadsModel;

class PreordersExport implements FromCollection, WithHeadings
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function collection()
    {
        return $this->query;
    }

    public function headings(): array
    {
        // Get column names from the model's table
        $columns = Schema::getColumnListing((new preordersModel())->getTable());
        // Filter out unwanted columns if needed
        $headers = array_filter($columns, function ($column) {
            return $column != 'id'; // Exclude 'id' column
        });
        return $headers;
    }
}
