<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfisCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfis_candidatos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('candidato_id')->unsigned();
            $table->foreign('candidato_id')
                ->references('id')
                ->on('candidatos');

            $table->string('rg', 20)->unique()->nullable();
            $table->string('orgao_expeditor', 20)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('telefone_celular', 20)->nullable();
            $table->string('telefone_fixo', 20)->nullable();
            $table->integer('cep')->nullable();
            $table->string('logradouro', 80)->nullable();
            $table->string('numero', 25)->nullable();
            $table->string('complemento', 40)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('estado', 2)->nullable();

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
        Schema::dropIfExists('perfis_candidatos');
    }
}
