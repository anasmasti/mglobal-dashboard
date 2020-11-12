<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMysysformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mysys_formations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('url_img')->nullable();
            $table->unsignedBigInteger('mysystheme_id')->unsigned();
            $table->string('description',1500)->nullable();
            $table->boolean('certif')->default(true)->nullable();
            $table->boolean('global_event')->default(false)->nullable();
            $table->string('programme',7500)->nullable();
            $table->string('professeur')->nullable();
            $table->string('prerequisite',1500)->nullable();
            $table->string('category')->nullable();
            $table->string('duration')->nullable();
            $table->string('objectif',1500)->nullable();
            $table->string('avantage',1500)->nullable();
            $table->string('prix')->nullable();
            $table->string('prix_off')->nullable();
            $table->timestamps();
            $table->foreign('mysystheme_id')->references('id')->on('mysys_themes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mysysformations');
    }
}
