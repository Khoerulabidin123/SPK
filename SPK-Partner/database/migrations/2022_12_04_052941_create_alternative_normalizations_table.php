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
        Schema::create('alternative_normalizations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('comparison_id');
            $table->float('value', 8, 5);
            $table->timestamps();

            $table->foreign('comparison_id')->references('id')->on('alternative_comparisons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternative_normalizations');
    }
};
