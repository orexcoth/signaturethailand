<?php
namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class UsersDetailCommissionExport implements FromCollection, WithHeadings, WithMapping
{
    protected $sellsWithDownloads;
    protected $preorders;
    protected $user;

    public function __construct($sellsWithDownloads, $preorders, $user)
    {
        $this->sellsWithDownloads = $sellsWithDownloads;
        $this->preorders = $preorders;
        $this->user = $user;
    }

    public function collection()
    {
        // Combine sells and preorders data
        return collect($this->sellsWithDownloads->merge($this->preorders));
    }

    public function headings(): array
    {
        // Define headings for the export file
        return [
            'Type',
            'Date',
            'Number',
            'Package',
            'Price',
            'Commission'
        ];
    }

    public function map($row): array
    {
        $type = isset($row['type']) ? $row['type'] : '';
        $date = Carbon::parse($row->created_at)->format('Y-m-d');
        $number = isset($row->number) ? $row->number : '';
        $package = isset($row->package) ? $row->package : '';
        $price = isset($row->preorder_price) ? $row->preorder_price : $row->total;
        $commission = $price * ($this->user->rate_preorder / 100);

        return [
            $type,
            $date,
            $number,
            $package,
            $price,
            $commission
        ];
    }
}
