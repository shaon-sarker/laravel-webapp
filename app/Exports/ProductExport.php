<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('name','price','quantity')->get();
    }
    // public function headings(): array
    // {
    //     return [
    //         'Name',
    //         'Price',
    //         'Quantity',
    //     ];
    // }
}
