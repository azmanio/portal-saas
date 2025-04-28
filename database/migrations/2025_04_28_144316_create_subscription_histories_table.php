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
        Schema::create('subscription_histories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('subscription_id')
                ->references('id')
                ->on('subscriptions')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('action');
            $table->datetime('at');
            $table->string('ip_address');
            $table->uuid('by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('subscription_histories');
    }
};