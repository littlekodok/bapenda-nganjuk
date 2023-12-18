<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepala_badans', function (Blueprint $table) {
            $table->id();
            $table->text('periode')->nullable();
            $table->text('nama')->nullable();
            $table->text('description')->nullable();
            $table->text('foto')->nullable();
            $table->tinyInteger('isactive')->default(1);
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
        Schema::dropIfExists('kepala_bidang');
    }
};
