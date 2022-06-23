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
        Schema::create('t_sales', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 15);
            $table->date('tgl');
            $table->foreignId('cust_id')->constrained('m_customers');
            $table->float('subtotal', 50, 2);
            $table->float('diskon', 50, 2);
            $table->float('ongkir', 50, 2);
            $table->float('total_bayar', 50, 2);
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
        Schema::dropIfExists('t_sales');
    }
};
