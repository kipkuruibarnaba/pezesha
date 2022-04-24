<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Jobs\SalesCsvProcess;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    return view("admin.products.create");
    }

    public function upload_csv_records(Request $request)
    {
        if($request->has('mycsv'))
        {
            $csv = file($request->mycsv);

            //chunking file
            $chunks = array_chunk($csv,50);

            //convert chunk to new csv file
            $path = resource_path('pending-files');
            foreach ($chunks as $key => $chunk) {
//                $name = resource_path('pending-files/'.date('y-m-d-H-i-s').$key.'.csv');
                $name = "/tmp{$key}.csv";
                file_put_contents($path.$name,$chunk);
            }

            //getting files
            $files = glob("$path/*.csv");
            $header = [];
            foreach($files as $k => $file) {
                $data = array_map('str_getcsv', file($file));
                if($k == 0) {
                    $header =$data[0];
                    unset($data[0]);
                }
                    SalesCsvProcess::dispatch($data ,$header);
                    unlink($file);
            }

            return back();

        }
        return "please upload csv file";

    }

    public function edit($id)
    {
        $product=Sale::find($id);
        return view('admin.products.edit',compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product=Sale::find($id);
        $product->Description = $request->input('description');
        $product->InvoiceNo = $request->input('invoiceno');
        $product->StockCode = $request->input('stockcode');
        $product->Quantity = $request->input('quantity');
        $product->InvoiceDate = $request->input('invoicedate');
        $product->UnitPrice = $request->input('unitprice');
        $product->CustomerID = $request->input('customerid');
        $product->Country = $request->input('country');
        $product->save();
        return redirect()->route('home')->with('success' , 'Item Updated Succesfullly!');
    }

    public function destroy($id)
    {
        $Product=Sale::find($id);
        $Product->delete();
        return redirect()->route('home')->with('success' , 'Item Trashed!');
    }

}
