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
        Schema::create('airlanes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('destination_from_id');
            $table->foreign('destination_from_id')
                ->references('id')
                ->on('destinations');
            $table->unsignedInteger('destination_to_id');
            $table->foreign('destination_to_id')
                ->references('id')
                ->on('destinations');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airlanes');
    }
};
