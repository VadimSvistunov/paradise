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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('director_id')->nullable();
            $table->integer('year');
            $table->decimal('rating', 3, 1)->nullable();
            $table->string('categories_ids');
            $table->timestamps();

            $table->foreign('director_id')
                ->references('id')
                ->on('directors')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
