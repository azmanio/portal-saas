<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('invoice_id')
                ->references('id')
                ->on('invoices')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('subscription_id')
                ->references('id')
                ->on('subscriptions')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->integer('qty')->comment('jumlah paket di bulan itu');
            $table->double('price');
            $table->double('price_eqv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('invoice_details');
    }
};
