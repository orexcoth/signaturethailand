<?php


namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use App\Models\sellsModel;
use App\Models\preordersModel;
use App\Models\preorders_signsModel;
use App\Models\downloadsModel;

class SellsExport implements FromCollection
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
        $query = SellsModel::query();

        if ($this->status && $this->status !== 'all') {
            $query->where('status', $this->status);
        }

        if ($this->keyword) {
            $query->where(function ($query) {
                $query->where('number', 'like', '%' . $this->keyword . '%')
                      ->orWhere('name_th', 'like', '%' . $this->keyword . '%')
                      ->orWhere('name_en', 'like', '%' . $this->keyword . '%')
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
}
