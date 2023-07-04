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
        Schema::create('izleti', function (Blueprint $table) {
            $table->id();
            $table->string('nazivIzleta');
            $table->double('cena');
            $table->unsignedBigInteger('drzavaId');
            $table->timestamps();

            $table->foreign('drzavaId')
                ->references('id')->on('drzaveIzleta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izleti');
    }
};
