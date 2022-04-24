<?php

namespace App\Jobs;

use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Products;

class SalesCsvProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    public $header;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $header)
    {
        $this->data = $data;
        $this->header = $header;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $sale) {
            $saleData = array_combine($this->header, $sale);
            Sale::create($saleData);
        }

//        $filepath = resource_path('temp/*.csv');
//        $files = glob($filepath);
//        $header = [];
//        foreach($files as $k => $file) {
//            $data = array_map('str_getcsv', file($file));
//            if($k == 0) {
//                $header =$data[0];
//                unset($data[0]);
//            }
//            foreach($data as $dat){
//                $salesData = array_combine($header, $dat);
//                Sale::create($salesData);
//            }
//            unset($file);
//
//        }
    }
}
