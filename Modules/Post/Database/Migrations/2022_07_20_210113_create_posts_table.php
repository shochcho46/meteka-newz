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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->tinyText('subhead')->nullable();
            $table->text('head');
            $table->longText('detail');
            $table->text('imgloc');
            $table->string('caption')->nullable();
            $table->bigInteger('view')->default(0);
            $table->string('author')->nullable();
            $table->integer('created_by');
            $table->integer('update_by')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('posts');
    }
};
