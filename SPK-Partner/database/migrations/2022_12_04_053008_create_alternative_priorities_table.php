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
        Schema::create('alternative_priorities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('criteria_id');
            $table->unsignedInteger('alternative_id');
            $table->float('value', 8, 5);
            $table->timestamps();

            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternative_priorities');
    }
};
