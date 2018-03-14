<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassicMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * User and roles relation table
         */
        Schema::create('classic_materia', function (Blueprint $table) {
            $table->integer('classi_concorso_id')->unsigned();
            $table->integer('materia_id')->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('classi_concorso_id', 'foreign_classe_concorso')
                ->references('id')
                ->on('classi_concorsos')
                ->onDelete('cascade');

            $table->foreign('materia_id', 'foreign_materia')
                ->references('id')
                ->on('materias')
                ->onDelete('cascade');

            $table->unique(['classi_concorso_id', 'materia_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classic_materia', function (Blueprint $table) {
            $table->dropForeign('foreign_classe_concorso');
            $table->dropForeign('foreign_materia');
        });

        /*
         * Drop tables
         */
        Schema::dropIfExists('classic_materia');
    }
}
