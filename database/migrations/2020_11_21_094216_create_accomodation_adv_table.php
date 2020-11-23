<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationAdvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_adv', function (Blueprint $table) {

            $table->unsignedBigInteger('accomodation_id');
            $table->unsignedBigInteger('adv_id');

            $table->dateTime('start_adv');
            $table->dateTime('end_adv');
            $table->unsignedDecimal('price_paid',4,2);

            // $table->timestamps();

            // Istruzioni per cancellazione chiave esterna
            $table->foreign('accomodation_id')->references('id')->on('accomodations')->onDelete('cascade');
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
