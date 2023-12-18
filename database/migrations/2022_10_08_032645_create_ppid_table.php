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
        Schema::create('ppids', function (Blueprint $table) {
            $table->id();
            $table->text('group')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('file')->nullable();
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
        Schema::dropIfExists('ppids');
    }
};
