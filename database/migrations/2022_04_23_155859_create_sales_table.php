<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->text('Description');
            $table->string('InvoiceNo');
            $table->string('StockCode');
            $table->string('Quantity');
            $table->date('InvoiceDate')->format('D/m/y/TH:i');
            $table->integer('UnitPrice');
            $table->integer('CustomerID');
            $table->string('Country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
