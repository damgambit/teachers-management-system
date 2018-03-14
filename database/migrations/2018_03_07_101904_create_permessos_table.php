<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permessos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('giorno');
            $table->date('data');
            $table->integer('ora');
            $table->boolean('recupero');

            $table->integer('motivo_id')->unsigned();

            $table->foreign('motivo_id', 'foreign_motivo')
                ->references('id')
                ->on('motivos')
                ->onDelete('cascade');

            $table->integer('docente_id')->unsigned();

            $table->foreign('docente_id', 'foreign_docente')
                ->references('id')
                ->on('docentes')
                ->onDelete('cascade');

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

        Schema::table('permessos', function (Blueprint $table) {

            $table->dropForeign('foreign_motivo');
            $table->dropForeign('foreign_docente');
        
        });

        Schema::dropIfExists('permessos');
    }
}
