<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class processCsvUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Redis::throttle('upload-csv')->block(0)->allow(1)->every(15)->then(function () {
            // info('Lock obtained...');
            dumb('processing this file :------', $this->file);
            $data = array_map('str_getcsv', file($this->file));
            foreach ($data as $row) {
                Products::updateOrCreate([
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
            dumb('done processing this file :------', $this->file);
            unlink($this->file);
        }, function () {
            // Could not obtain lock...
     
            return $this->release(5);
        });
    }
}
