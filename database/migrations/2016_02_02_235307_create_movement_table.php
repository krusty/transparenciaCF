<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('group_id');
            $table->integer('category_id');
            $table->integer('person_id');
            $table->date('fecha');
            $table->decimal('monto', 10, 2);
            $table->enum('tipo', ['ingreso', 'egreso']);
            $table->string('comprobante');
            $table->text('notas');

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
        Schema::drop('movimientos');
    }
}
