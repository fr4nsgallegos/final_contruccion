<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\MallaAcademica::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'anio_creacion' => $faker->date(),
        'cantidad_anios' => $faker->randomNumber(5),
        'cantidad_semestre' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DiaSemana::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'orden' => $faker->sentence,
        'sigla' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CursoAcademico::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        
        
    ];
});
