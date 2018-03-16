<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->increments('id');

            // Chaves estrangeiras
            $table->integer('inscricao_id')
                ->unsigned();
            $table->foreign('inscricao_id')
                ->references('id')
                ->on('inscricoes');

            $table->integer('processo_seletivo_id')
                ->unsigned();
            $table->foreign('processo_seletivo_id')
                ->references('id')
                ->on('processos_seletivos');

            // Recursos etapa 1 - Média aritmética
            $table->text('resposta_etapa_1')
                ->nullable();
            $table->string('autor_resposta_etapa_1', 150)
                ->nullable();
            $table->date('data_resposta_etapa_1')
                ->nullable();

            // Recursos etapa 2 - Documentação
            $table->text('motivo_indeferimento_etapa_2')
                ->nullable();
            $table->text('resposta_etapa_2')
                ->nullable();
            $table->string('autor_resposta_etapa_2', 150)
                ->nullable();
            $table->date('data_resposta_etapa_2')
                ->nullable();

            $table->unique([
                'inscricao_id',
                'processo_seletivo_id'
            ], 'uk_recursos');

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
        Schema::dropIfExists('recursos');
    }
}
