<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');

            // Foreign keys
            $table->integer('processo_seletivo_id')->unsigned();
            $table->foreign('processo_seletivo_id')
                ->references('id')
                ->on('processos_seletivos');

            $table->dateTime('inicio_inscricoes');
            $table->dateTime('termino_inscricoes');
            $table->dateTime('rp_etapa_1');
            $table->dateTime('rf_etapa_1');
            $table->dateTime('rp_etapa_2');
            $table->dateTime('rf_etapa_2');
            $table->dateTime('recurso_etapa_1');
            $table->dateTime('recurso_etapa_2');
            $table->date('data_vencimento_dae');
            $table->string('mes_referencia_dae');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
