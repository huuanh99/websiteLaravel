<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_import', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('tbl_product')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_import');
    }
}
