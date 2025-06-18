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
        Schema::create('trafo_dayas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_gardu_induk');
            $table->string('nama');
            $table->string('kap');
            $table->string('setting_rele');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trafo_dayas');
    }
};
