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
        Schema::create('websettings', function (Blueprint $table) {
            $table->id();
            $table->string('logotext');
            $table->string('apptitle')->nullable();
            $table->integer('language_id');
            $table->integer('font_id');
            $table->integer('country_id');
            $table->integer('timezone_id');
            $table->text('logo')->nullable();
            $table->text('favicone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websettings');
    }
};
