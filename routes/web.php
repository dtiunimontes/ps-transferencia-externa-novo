<?php

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/user/logout', 'Auth\LoginController@logout')->name('user.logout');

Route::post('/processo_seletivo/setar/sessao', 'ProcessoSeletivoController@colocarProcessoSeletivoNaSessao');

// Acesso para o candidato autenticado
Route::group([
    'namespace' => 'Candidato',
    'prefix' => 'candidato',
    'as' => 'candidato.',
    'middleware' => 'auth'
    ], function () {

    // Página principal
        Route::get('/', 'HomeController@index')->name('home');

    // Edição do Perfil do Candidato
        Route::resource('perfil', 'PerfilController', ['only' => ['edit', 'update']]);
        Route::put('/{candidato}', 'CandidatoController@update')->name('update');

    // Inscrições no processo seletivo atual
        Route::group([
            'namespace' => 'Inscricao',
            'prefix' => 'inscricao',
            'as' => 'inscricao.',
            ], function () {
                Route::name('processo_seletivo.form')
                ->get('processo_seletivo', 'InscricaoProcessoSeletivoAtualController@showFormInscricao');
                Route::name('processo_seletivo.submit')
                ->post('processo_seletivo', 'InscricaoProcessoSeletivoAtualController@inscreverCandidato');
            });

        
    });


