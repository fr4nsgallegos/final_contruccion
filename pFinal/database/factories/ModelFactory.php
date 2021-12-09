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
$factory->define(App\Models\Local::class, static function (Faker\Generator $faker) {
    return [
        'nombre_local' => $faker->sentence,
        'sigla' => $faker->sentence,
        'tipo_local' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TipologiaClase::class, static function (Faker\Generator $faker) {
    return [
        'nombre_tipologia' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DiaSemana::class, static function (Faker\Generator $faker) {
    return [
        'nombre_dia_semana' => $faker->sentence,
        'orden' => $faker->sentence,
        'sigla' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CursoAcademico::class, static function (Faker\Generator $faker) {
    return [
        'nombre_curso_academico' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AnioAcademico::class, static function (Faker\Generator $faker) {
    return [
        'nombre_anio_academico' => $faker->sentence,
        'sigla' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\MallaAcademica::class, static function (Faker\Generator $faker) {
    return [
        'nombre_malla_academica' => $faker->sentence,
        'anio_creacion' => $faker->date(),
        'cantidad_anios' => $faker->randomNumber(5),
        'cantidad_semestre' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SesionClase::class, static function (Faker\Generator $faker) {
    return [
        'nombre_sesion_clase' => $faker->sentence,
        'sigla' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Asignatura::class, static function (Faker\Generator $faker) {
    return [
        'nombre_asignatura' => $faker->sentence,
        'sigla' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SemestreAcademico::class, static function (Faker\Generator $faker) {
    return [
        'nombre_semestre' => $faker->sentence,
        'orden' => $faker->sentence,
        'sesion_clase_id' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Turno::class, static function (Faker\Generator $faker) {
    return [
        'nombre_turno' => $faker->sentence,
        'sigla' => $faker->sentence,
        'orden' => $faker->sentence,
        'hora_inicio' => $faker->time(),
        'hora_fin' => $faker->time(),
        'sesion_clase_id' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\MallaCurso::class, static function (Faker\Generator $faker) {
    return [
        'cantidad_horas_tipologia' => $faker->randomNumber(5),
        'cantidad_credito' => $faker->randomFloat,
        'malla_academica_id' => $faker->randomNumber(5),
        'asignatura_id' => $faker->randomNumber(5),
        'tipologia_clase_id' => $faker->randomNumber(5),
        'semestre_academico_id' => $faker->randomNumber(5),
        'anio_academico_id' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AdminUser::class, static function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => $faker->boolean(),
        'forbidden' => $faker->boolean(),
        'language' => $faker->sentence,
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AdminUser::class, static function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'usuario' => $faker->sentence,
        'dni' => $faker->sentence,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => $faker->boolean(),
        'forbidden' => $faker->boolean(),
        'language' => $faker->sentence,
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\MallaProfesor::class, static function (Faker\Generator $faker) {
    return [
        'admin_users_id' => $faker->randomNumber(5),
        'curso_academico_id' => $faker->randomNumber(5),
        'malla_curso_id' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Evento::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'descripcion' => $faker->sentence,
        'start' => $faker->dateTime,
        'end' => $faker->dateTime,
        'malla_profesor_id' => $faker->randomNumber(5),
        'local_id' => $faker->randomNumber(5),
        
        
    ];
});
