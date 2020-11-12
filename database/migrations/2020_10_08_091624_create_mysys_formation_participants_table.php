<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMysysFormationParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mysys_formation_participants', function (Blueprint $table) {
            $table->unsignedBigInteger('mf_id')->unsigned();
            $table->unsignedBigInteger('mp_id')->unsigned();
            $table->foreign('mf_id')->references('id')->on('mysys_formations')->onDelete('cascade');
            $table->foreign('mp_id')->references('id')->on('mysys_participants')->onDelete('cascade');
            $table->primary(array('mf_id', 'mp_id'));
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
        Schema::dropIfExists('mysys_formation_participants');
    }
}
