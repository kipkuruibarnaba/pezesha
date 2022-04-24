<?php

namespace App\Exports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProducts implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Products::all();
        return User::select('Description','InvoiceNo','StockCode','Quantity','InvoiceDate','UnitPrice','CustomerID','Country')->get();
    }
}
