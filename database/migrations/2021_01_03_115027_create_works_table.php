<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('small_description');
            $table->longText('job_description');
            $table->longText('description');
            $table->string('main_image');

            $table->string('image1');
            $table->string('price1');

            $table->string('image2');
            $table->string('price2');

            $table->string('image3');
            $table->string('price3');

            $table->string('image4');
            $table->string('price4');

            $table->softDeletes();
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
        Schema::dropIfExists('works');
    }
}
