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
        Schema::create('paste_bins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->longText('paste');
            $table->string('postedBy')->nullable();
            $table->string('title')->nullable();
            $table->dateTime('expires')->nullable();
            $table->string('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paste_bins');
    }
};
