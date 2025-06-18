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
        Schema::create('table_data_trafo_dayas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_trafo_daya');
            $table->integer('bulan');
            $table->integer('tahun');
            //siang 
            $table->integer('amp_siang');
            $table->integer('teg_siang');
            $table->integer('mw_siang');
            $table->float('persen_siang');
            // malam
            $table->integer('amp_malam');
            $table->integer('teg_malam');
            $table->integer('mw_malam');
            $table->float('persen_malam');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_data_trafo_dayas');
    }
};
