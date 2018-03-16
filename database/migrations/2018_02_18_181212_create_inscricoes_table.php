<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->increments('id');

            // Chaves estrangeiras
            $table->integer('candidato_id')->unsigned();
            $table->foreign('candidato_id')
                ->references('id')
                ->on('candidatos');
            $table->integer('processo_seletivo_id')->unsigned();
            $table->foreign('processo_seletivo_id')
                ->references('id')
                ->on('processos_seletivos');
            $table->integer('transferencia_id')->unsigned();
            $table->foreign('transferencia_id')
                ->references('id')
                ->on('transferencias');

            // Atributos normais
            $table->string('numero_dae')
                ->nullable();

            $table->boolean('dae_paga')
                ->default(0)
                ->comment('1 - dae paga, 0 - dae não paga');

            $table->date('data_vencimento_dae')->nullable();
            $table->string('mes_referencia_dae')->nullable();

            $table->boolean('envelope_1')
                ->default(0)
                ->comment('1 - entregue, 0 - não entregue');

            $table->boolean('envelope_2')
                ->default(0)
                ->comment('1 - entregue, 0 - não entregue');

            $table->boolean('status_etapa_2')
                ->default(0)
                ->comment('1 - deferido, 0 - indeferido');

            $table->float('nota', 8, 2)
                ->nullable()
                ->comment('média aritmética das disciplinas cursadas pelo candidato');

            $table->integer('disciplinas_a_cursar')
                ->nullable()
                ->comment('quantidade de disciplinas a serem cumpridas pelo candidato');

            // Outros atributos

            $table->unique([
                'candidato_id',
                'processo_seletivo_id',
                'transferencia_id',
            ], 'uk_cand_ps_trans');

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
        Schema::dropIfExists('inscricoes');
    }
}
