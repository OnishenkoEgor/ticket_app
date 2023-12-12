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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->text('first_name');
            $table->text('second_name');
            $table->text('last_name');
            $table->unsignedSmallInteger('country_id');
            $table->foreign('country_id')
                ->references('id')
                ->on('countries');
            $table->smallInteger('age');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};
