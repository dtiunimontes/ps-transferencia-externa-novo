<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->integer('id')->unsigned();

            // Chaves estrangeiras
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')
                ->references('id')
                ->on('cursos');
            $table->integer('campi_id')->unsigned();
            $table->foreign('campi_id')
                ->references('id')
                ->on('campi');
            $table->integer('processo_seletivo_id')->unsigned();
            $table->foreign('processo_seletivo_id')
                ->references('id')
                ->on('processos_seletivos');

            // Outros atributos
            $table->integer('vagas');
            $table->enum('turno', [
                'matutino',
                'vespertino',
                'noturno',
                'diurno',
                'integral',
            ]);
            $table->integer('periodo');

            $table->unique([
                'id',
                'processo_seletivo_id'
            ], 'uk_transferencias');

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
        Schema::dropIfExists('transferencias');
    }
}
