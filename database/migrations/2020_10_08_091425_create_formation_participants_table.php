<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formation_participants', function (Blueprint $table) {
            $table->unsignedBigInteger('formation_id')->unsigned();
            $table->unsignedBigInteger('participant_id')->unsigned();
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
            $table->primary(array('formation_id', 'participant_id'));
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
        Schema::dropIfExists('formation_participants');
    }
}
