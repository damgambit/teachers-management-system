<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cognome');
            $table->string('cellulare');
            $table->string('email');

            $table->integer('classi_concorso_id')->unsigned();

            $table->foreign('classi_concorso_id', 'foreign_classe_concorso_docente')
                ->references('id')
                ->on('classi_concorsos')
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

        Schema::table('docentes', function (Blueprint $table) {
            $table->dropForeign('foreign_classe_concorso_docente');
        });

        Schema::dropIfExists('docentes');
    }
}
