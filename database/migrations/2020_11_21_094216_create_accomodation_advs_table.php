<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationAdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_advs', function (Blueprint $table) {

            $table->unsignedBigInteger('accomodation_id');
            $table->unsignedBigInteger('adv_id');

            $table->date('start_adv');
            $table->date('end_adv');

            $table->timestamps();

            // Istruzioni per cancellazione chiave esterna
            $table->foreign('accomodation_id')->references('id')->on('accomodations')->onDelete('cascade');
            $table->foreign('adv_id')->references('id')->on('advs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodation_advs');
    }
}
