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
        Schema::create('pages_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('origin_page_id');
            $table->foreign('origin_page_id')->references('id')->on('pages');
            $table->foreignId('destination_page_id');
            $table->foreign('destination_page_id')->references('id')->on('pages');
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
        Schema::dropIfExists('pages_pages');
    }
};
