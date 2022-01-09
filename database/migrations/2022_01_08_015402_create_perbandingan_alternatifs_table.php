<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbandinganAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbandingan_alternatif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternatif1_id')->constrained('alternatif')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('alternatif2_id')->constrained('alternatif')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kriteria_id')->constrained('kriteria')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nilai', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perbandingan_alternatif');
    }
}
