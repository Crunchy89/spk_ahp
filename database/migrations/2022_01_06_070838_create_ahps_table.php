<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria1_id')->constrained('kriteria')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kriteria2_id')->constrained('kriteria')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('ahp');
    }
}
