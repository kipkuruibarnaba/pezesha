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
            $table->text('Description', 255)->nullable();
            $table->string('InvoiceNo', 255)->nullable();
            $table->string('StockCode', 255)->nullable();
            $table->string('Quantity', 255)->nullable();
            $table->string('InvoiceDate', 255)->nullable();
            $table->double('UnitPrice', 255)->nullable();
            $table->string('CustomerID', 255)->nullable();
            $table->string('Country', 255)->nullable();
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
