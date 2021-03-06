<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('festivals');
        Schema::create('festivals', function (Blueprint $table) {
            $table->id();
            $table->string('titel');
            $table->date('begindatum');
            $table->date('einddatum');
            $table->float('prijs');
            $table->text('CovidInfo');
            $table->timestamps();
            $table->string('stad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('festivals');
    }
}
