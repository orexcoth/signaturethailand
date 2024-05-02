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
    protected $status;
    protected $keyword;

    public function __construct($status, $keyword)
    {
        $this->status = $status;
        $this->keyword = $keyword;
    }

    public function collection()
    {
        $query = PreordersModel::query();

        if ($this->status && $this->status !== 'all') {
            $query->where('status', $this->status);
        }

        if ($this->keyword) {
            $query->where(function ($query) {
                $query->where('number', 'like', '%' . $this->keyword . '%')
                      ->orWhere('email', 'like', '%' . $this->keyword . '%')
                      ->orWhere('firstname', 'like', '%' . $this->keyword . '%')
                      ->orWhere('lastname', 'like', '%' . $this->keyword . '%');
            })->orWhereHas('customers', function ($query) {
                $query->where('email', 'like', '%' . $this->keyword . '%')
                      ->orWhere('firstname', 'like', '%' . $this->keyword . '%')
                      ->orWhere('lastname', 'like', '%' . $this->keyword . '%');
            });
        }

        return $query->get();
    }

    public function headings(): array
    {
        // Get column names from the model's table
        $columns = Schema::getColumnListing((new PreordersModel())->getTable());
        // Filter out unwanted columns if needed
        $headers = array_filter($columns, function ($column) {
            return $column != 'id'; // Exclude 'id' column
        });
        return $headers;
    }
}
