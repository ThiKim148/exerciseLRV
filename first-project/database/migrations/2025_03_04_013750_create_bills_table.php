<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_customer')->nullable();
            $table->date('date_order')->nullable();
            $table->float('total')->nullable()->comment('Tổng tiền');
            $table->string('payment', 200)->nullable()->collation('utf8_unicode_ci')->comment('Hình thức thanh toán');
            $table->string('note', 500)->nullable()->collation('utf8_unicode_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
