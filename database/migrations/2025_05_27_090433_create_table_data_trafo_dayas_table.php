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
            $table->foreignId('id_trafo_daya')->constrained('trafo_dayas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('bulan');
            $table->integer('tahun');
            //siang 
            $table->float('amp_siang');
            $table->float('teg_siang');
            $table->float('mw_siang');
            $table->float('persen_siang');
            // malam
            $table->float('amp_malam');
            $table->float('teg_malam');
            $table->float('mw_malam');
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
