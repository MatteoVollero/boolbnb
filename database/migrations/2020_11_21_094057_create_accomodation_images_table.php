<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_images', function (Blueprint $table) {

            $table->unsignedBigInteger('accomodation_id');

            $table->string('image');

            $table->boolean('principal')->default(false);

            $table->timestamps();

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
        Schema::dropIfExists('accomodation_images');
    }
}
