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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignUuid('plan_id')
                ->references('id')
                ->on('plans')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->integer('qty')->comment('jumlah paket');
            $table->double('price');
            $table->boolean('status')->default(true)->comment('Aktif?');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('subscriptions');
    }
};
