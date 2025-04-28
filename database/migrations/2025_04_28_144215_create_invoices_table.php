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
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->uuid('invoice_no')->unique();
            $table->timestamp('invoice_date');
            $table->timestamp('due_date');
            $table->string('currency_code')->default('IDR');
            $table->double('exchange_rate')->default(1);
            $table->double('amount');
            $table->double('amount_eqv');
            $table->text('note')->nullable();
            $table->enum('status', ['paid', 'unpaid'])->comment('status invoice');
            $table->string('payment_method');
            $table->enum('payment_status', ['pending', 'success', 'failed']);
            $table->timestamp('payment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('invoices');
    }
};
