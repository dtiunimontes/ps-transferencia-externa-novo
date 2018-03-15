<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Candidato::class, function (Faker\Generator $faker) {

    $faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));
    static $password;

    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'cpf' => $faker->cpf(false),
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Admin::class, function (Faker\Generator $faker) {

    $faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));
    static $password;

    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PerfilCandidato::class, function (Faker\Generator $faker) {

    $faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));

    return [
        'candidato_id' => '',
        'rg' => $faker->rg,
        'orgao_expeditor' => 'SSP/MG',
        'data_nascimento' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'telefone_celular' => '0' . $faker->areaCode . $faker->tollFreePhoneNumber,
        'telefone_fixo' => '0' . $faker->areaCode . $faker->tollFreePhoneNumber,
        'cep' => '39400496',
        'logradouro' => $faker->streetAddress,
        'numero' => $faker->numberBetween(1, 20000),
        'complemento' => 'Casa',
        'cidade' => $faker->city,
        'bairro' => $faker->city,
        'estado' => 'MG',
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ProcessoSeletivo::class, function (Faker\Generator $faker) {

    $semestreLetivo = ['01', '02'];
    $key = array_rand($semestreLetivo, 1);

    return [
        'titulo' => $semestreLetivo[$key] . '/' . $faker->unique()->year,
        'ativo' => 1,
        'finalizado' => 0,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Campi::class, function (Faker\Generator $faker) {

    return [
        'nome' => $faker->unique()->streetName,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Curso::class, function (Faker\Generator $faker) {

    return [
        'nome' => $faker->unique()->streetName,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Transferencia::class, function (Faker\Generator $faker) {

    $turnos = ['matutino', 'vespertino', 'noturno', 'diurno', 'integral'];
    $chave = array_rand($turnos, 1);

    return [
        'vagas' => rand(2, 20),
        'turno' => $turnos[$chave],
        'periodo' => rand(1, 12),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Inscricao::class, function (Faker\Generator $faker) {

    return [

    ];
});
