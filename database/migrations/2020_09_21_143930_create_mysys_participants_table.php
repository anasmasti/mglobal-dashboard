<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMysysparticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mysys_participants', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();;;
            $table->string('type')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('mysysformation_id')->unsigned();
            $table->foreign('mysysformation_id')->references('id')->on('mysys_formations')->onDelete('cascade');
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
        Schema::dropIfExists('mysysparticipant');
    }
}
