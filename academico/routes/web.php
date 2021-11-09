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