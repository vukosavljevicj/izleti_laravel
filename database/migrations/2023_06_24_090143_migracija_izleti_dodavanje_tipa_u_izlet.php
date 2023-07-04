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
        Schema::table('izleti', function (Blueprint $table) {
            $table->unsignedBigInteger('tipId')->after('drzavaId');
            $table->foreign('tipId')
                ->references('id')->on('tipoviIzleta')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
