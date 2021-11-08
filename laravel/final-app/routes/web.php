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
        Route::prefix('posts')->name('posts/')->group(static function() {
            Route::get('/',                                             'PostsController@index')->name('index');
            Route::get('/create',                                       'PostsController@create')->name('create');
            Route::post('/',                                            'PostsController@store')->name('store');
            Route::get('/{post}/edit',                                  'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}',                                      'PostsController@update')->name('update');
            Route::delete('/{post}',                                    'PostsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('locales')->name('locales/')->group(static function() {
            Route::get('/',                                             'LocalesController@index')->name('index');
            Route::get('/create',                                       'LocalesController@create')->name('create');
            Route::post('/',                                            'LocalesController@store')->name('store');
            Route::get('/{locale}/edit',                                'LocalesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LocalesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{locale}',                                    'LocalesController@update')->name('update');
            Route::delete('/{locale}',                                  'LocalesController@destroy')->name('destroy');
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