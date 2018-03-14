<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('giorno');
            $table->integer('ora');
            $table->string('laboratorio');
            $table->boolean('copresenza');

            
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id', 'foreign_classe')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade');

            
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id', 'foreign_docente_o')
                ->references('id')
                ->on('docentes')
                ->onDelete('cascade');

            
            $table->integer('materia_id')->unsigned();
            $table->foreign('materia_id', 'foreign_materia_o')
                ->references('id')
                ->on('materias')
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
        
        Schema::table('orarios', function (Blueprint $table) {

            $table->dropForeign('foreign_classe');
            $table->dropForeign('foreign_docente_o');
            $table->dropForeign('foreign_materia_o');
        
        });

        Schema::dropIfExists('orarios');
    
    }
}
