<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->id();
            $table->string('header_title')->nullable();
            $table->string('header_subTitle')->nullable();
            $table->string('sector_title')->nullable();
            $table->string('about_title')->nullable();
            $table->longText('about_content')->nullable();
            $table->string('investor_title')->nullable();
            $table->longText('investor_content')->nullable();
            $table->longText('team_title')->nullable();
            $table->longText('project_title')->nullable();
            $table->longText('footer_content')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkenin_url')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->longText('terms')->nullable();
            $table->longText('policy')->nullable();

            $table->string('language');
            $table->unsignedBigInteger('setting_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_translations');
    }
}
