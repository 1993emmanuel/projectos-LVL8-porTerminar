<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreadoPorAUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Users', function (Blueprint $table) {
            /**
                generamos un campo mas llamado estatus para
                valores aceptados 1->activo
                2->suspendido
                0->eliminado
            **/
            $table->integer('estatus')->default(1);
            $table->integer('creadoPor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Users', function (Blueprint $table) {
            //
        });
    }
}
