<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anno');
            $table->string('istituto');
            $table->string('aula');

            $table->integer('sezione_id')->unsigned();

            $table->foreign('sezione_id', 'foreign_sezione')
                ->references('id')
                ->on('seziones')
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

        Schema::table('classes', function (Blueprint $table) {

            $table->dropForeign('foreign_sezione');
        
        });

        Schema::dropIfExists('classes');
    }
}
