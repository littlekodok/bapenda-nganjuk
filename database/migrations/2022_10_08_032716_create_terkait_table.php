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
        Schema::create('terkaits', function (Blueprint $table) {
            $table->id();
            $table->text('brand')->nullable();
            $table->text('caption')->nullable();
            $table->text('link')->nullable();
            $table->text('img')->nullable();
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
        Schema::dropIfExists('terkaits');
    }
};
