<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSostituzionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sostituziones', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('orario_id')->unsigned();
            $table->foreign('orario_id', 'foreign_orario')
                ->references('id')
                ->on('orarios')
                ->onDelete('cascade');

            
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id', 'foreign_docente_s')
                ->references('id')
                ->on('docentes')
                ->onDelete('cascade');

            $table->date('date');

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
        
        Schema::table('sostituziones', function (Blueprint $table) {

            $table->dropForeign('foreign_orario');
            $table->dropForeign('foreign_docente_o');
        
        });

        Schema::dropIfExists('sostituziones');
    
    }
}
