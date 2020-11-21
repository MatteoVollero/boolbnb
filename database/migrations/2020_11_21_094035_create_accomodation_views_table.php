<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_views', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accomodation_id');

            $table->date('date');
            $table->string('user_ip',30);

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
        Schema::dropIfExists('accomodation_views');
    }
}
