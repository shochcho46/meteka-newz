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
        Schema::create('displays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id');
            $table->bigInteger('mainmenu_id');
            $table->bigInteger('submenu_id')->nullable();
            $table->boolean('status');
            $table->boolean('is_headline')->default(0);
            $table->boolean('is_fbcomment')->default(1);
            $table->boolean('is_scroll')->default(0);
            $table->softDeletes();

            $table->timestamp('created_at')->useCurrent();

            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('displays');
    }
};
