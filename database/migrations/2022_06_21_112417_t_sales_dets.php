<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sales_dets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_id')->nullable()->constrained('t_sales');
            $table->foreignId('barang_id')->constrained('m_barangs');
            $table->float('harga_bandrol', 50, 2);
            $table->integer('qty',);
            $table->float('diskon_pct', 4, 2)->nullable();
            $table->float('diskon_nilai', 50, 2)->nullable();
            $table->float('harga_diskon', 50, 2);
            $table->float('total', 50, 2);
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
        Schema::dropIfExists('t_sales_dets');
    }
};
