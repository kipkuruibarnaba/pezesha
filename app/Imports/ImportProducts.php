<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProducts implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Products([
            'Description' => $row[0], 
            'InvoiceNo' => $row[1], 
            'StockCode' => $row[2], 
            'Quantity' => $row[3], 
            'InvoiceDate' => $row[4], 
            'UnitPrice' => $row[5], 
            'CustomerID' => $row[6], 
            'Country' => $row[7], 
        ]);
    }
}
