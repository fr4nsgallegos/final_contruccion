<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('malla-academicas')->name('malla-academicas/')->group(static function() {
            Route::get('/',                                             'MallaAcademicaController@index')->name('index');
            Route::get('/create',                                       'MallaAcademicaController@create')->name('create');
            Route::post('/',                                            'MallaAcademicaController@store')->name('store');
            Route::get('/{mallaAcademica}/edit',                        'MallaAcademicaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MallaAcademicaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{mallaAcademica}',                            'MallaAcademicaController@update')->name('update');
            Route::delete('/{mallaAcademica}',                          'MallaAcademicaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('dia-semanas')->name('dia-semanas/')->group(static function() {
            Route::get('/',                                             'DiaSemanaController@index')->name('index');
            Route::get('/create',                                       'DiaSemanaController@create')->name('create');
            Route::post('/',                                            'DiaSemanaController@store')->name('store');
            Route::get('/{diaSemana}/edit',                             'DiaSemanaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DiaSemanaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{diaSemana}',                                 'DiaSemanaController@update')->name('update');
            Route::delete('/{diaSemana}',                               'DiaSemanaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('curso-academicos')->name('curso-academicos/')->group(static function() {
            Route::get('/',                                             'CursoAcademicoController@index')->name('index');
            Route::get('/create',                                       'CursoAcademicoController@create')->name('create');
            Route::post('/',                                            'CursoAcademicoController@store')->name('store');
            Route::get('/{cursoAcademico}/edit',                        'CursoAcademicoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CursoAcademicoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cursoAcademico}',                            'CursoAcademicoController@update')->name('update');
            Route::delete('/{cursoAcademico}',                          'CursoAcademicoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('anio-academicos')->name('anio-academicos/')->group(static function() {
            Route::get('/',                                             'AnioAcademicoController@index')->name('index');
            Route::get('/create',                                       'AnioAcademicoController@create')->name('create');
            Route::post('/',                                            'AnioAcademicoController@store')->name('store');
            Route::get('/{anioAcademico}/edit',                         'AnioAcademicoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AnioAcademicoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{anioAcademico}',                             'AnioAcademicoController@update')->name('update');
            Route::delete('/{anioAcademico}',                           'AnioAcademicoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('locals')->name('locals/')->group(static function() {
            Route::get('/',                                             'LocalController@index')->name('index');
            Route::get('/create',                                       'LocalController@create')->name('create');
            Route::post('/',                                            'LocalController@store')->name('store');
            Route::get('/{local}/edit',                                 'LocalController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LocalController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{local}',                                     'LocalController@update')->name('update');
            Route::delete('/{local}',                                   'LocalController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('sesion-clases')->name('sesion-clases/')->group(static function() {
            Route::get('/',                                             'SesionClaseController@index')->name('index');
            Route::get('/create',                                       'SesionClaseController@create')->name('create');
            Route::post('/',                                            'SesionClaseController@store')->name('store');
            Route::get('/{sesionClase}/edit',                           'SesionClaseController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SesionClaseController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{sesionClase}',                               'SesionClaseController@update')->name('update');
            Route::delete('/{sesionClase}',                             'SesionClaseController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tipologia-clases')->name('tipologia-clases/')->group(static function() {
            Route::get('/',                                             'TipologiaClaseController@index')->name('index');
            Route::get('/create',                                       'TipologiaClaseController@create')->name('create');
            Route::post('/',                                            'TipologiaClaseController@store')->name('store');
            Route::get('/{tipologiaClase}/edit',                        'TipologiaClaseController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TipologiaClaseController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tipologiaClase}',                            'TipologiaClaseController@update')->name('update');
            Route::delete('/{tipologiaClase}',                          'TipologiaClaseController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('asignaturas')->name('asignaturas/')->group(static function() {
            Route::get('/',                                             'AsignaturaController@index')->name('index');
            Route::get('/create',                                       'AsignaturaController@create')->name('create');
            Route::post('/',                                            'AsignaturaController@store')->name('store');
            Route::get('/{asignatura}/edit',                            'AsignaturaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AsignaturaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{asignatura}',                                'AsignaturaController@update')->name('update');
            Route::delete('/{asignatura}',                              'AsignaturaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('semestre-academicos')->name('semestre-academicos/')->group(static function() {
            Route::get('/',                                             'SemestreAcademicoController@index')->name('index');
            Route::get('/create',                                       'SemestreAcademicoController@create')->name('create');
            Route::post('/',                                            'SemestreAcademicoController@store')->name('store');
            Route::get('/{semestreAcademico}/edit',                     'SemestreAcademicoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SemestreAcademicoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{semestreAcademico}',                         'SemestreAcademicoController@update')->name('update');
            Route::delete('/{semestreAcademico}',                       'SemestreAcademicoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('profesors')->name('profesors/')->group(static function() {
            Route::get('/',                                             'ProfesorController@index')->name('index');
            Route::get('/create',                                       'ProfesorController@create')->name('create');
            Route::post('/',                                            'ProfesorController@store')->name('store');
            Route::get('/{profesor}/edit',                              'ProfesorController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProfesorController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{profesor}',                                  'ProfesorController@update')->name('update');
            Route::delete('/{profesor}',                                'ProfesorController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('turnos')->name('turnos/')->group(static function() {
            Route::get('/',                                             'TurnoController@index')->name('index');
            Route::get('/create',                                       'TurnoController@create')->name('create');
            Route::post('/',                                            'TurnoController@store')->name('store');
            Route::get('/{turno}/edit',                                 'TurnoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TurnoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{turno}',                                     'TurnoController@update')->name('update');
            Route::delete('/{turno}',                                   'TurnoController@destroy')->name('destroy');
        });
    });
});