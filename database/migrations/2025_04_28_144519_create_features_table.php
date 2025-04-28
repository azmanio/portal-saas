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
        Schema::create('features', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('modul_id')
                ->references('id')
                ->on('modules')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('feature_name');
            $table->text('description');
            $table->boolean('status')->default(true)->comment('Aktif?');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('features');
    }
};
