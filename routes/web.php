<?php

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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');



    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});


Route::get('/', 'HomeController@index');


/*
 *  Routes delle materie
 */
Route::get('materie', 'MateriaController@index')->name('materie');
Route::post('materia', 'MateriaController@create')->name('create_materia');
Route::get('materia/del/{materia_id}', 'MateriaController@delete')->name('delete_materia');
Route::get('materia/{materia_id}', 'MateriaController@show')->name('info_materia');


/*
 *  Routes delle classi concorso
 */
Route::get('classi_concorso', 'ClassiConcorsoController@index')->name('classi_concorso');
Route::post('classi_concorso', 'ClassiConcorsoController@create')->name('create_classi_concorso');
Route::get('classi_concorso/del/{classi_concorso_id}', 'ClassiConcorsoController@delete')->name('delete_classi_concorso');
Route::get('classi_concorso/{classi_concorso_id}', 'ClassiConcorsoController@show')->name('materie_classi_concorso');
Route::post('classi_concorso/add_cc_materia', 'ClassiConcorsoController@add_ccmateria')->name('add_ccmateria');
Route::get('classi_concorso/delete_cc_materia/{classi_concorso_id}/{materia_id}', 'ClassiConcorsoController@delete_ccmateria')->name('delete_ccmateria');



/*
 *  Routes dei docenti
 */
Route::get('docenti', 'DocenteController@index')->name('docenti');
Route::post('docenti', 'DocenteController@create')->name('create_docenti');
Route::get('docenti/del/{docenti_id}', 'DocenteController@delete')->name('delete_docenti');
Route::get('docenti/{docenti_id}', 'DocenteController@show')->name('info_docenti');

/*
 *  Routes dei motivi
 */
Route::get('motivi', 'MotivoController@index')->name('motivi');
Route::post('motivi', 'MotivoController@create')->name('create_motivi');
Route::get('motivi/del/{motivi_id}', 'MotivoController@delete')->name('delete_motivi');
Route::get('motivi/{motivi_id}', 'MotivoController@show')->name('info_motivi');


/*
 *  Routes dei permessi
 */
Route::get('permessi', 'PermessoController@index')->name('permessi');
Route::post('permessi', 'PermessoController@create')->name('create_permessi');
Route::get('permessi/del/{permessi_id}', 'PermessoController@delete')->name('delete_permessi');
Route::get('permessi/{permessi_id}', 'PermessoController@show')->name('info_permessi');
Route::post('permessi/update_recupero/{permessi_id}', 'PermessoController@update_recupero')->name('update_recupero');


/*
 *  Routes delle sezioni
 */
Route::get('sezioni', 'SezioneController@index')->name('sezioni');
Route::post('sezioni', 'SezioneController@create')->name('create_sezioni');
Route::get('sezioni/del/{sezioni_id}', 'SezioneController@delete')->name('delete_sezioni');
Route::get('sezioni/{sezioni_id}', 'SezioneController@show')->name('info_sezioni');


/*
 *  Routes delle classi
 */
Route::get('classi', 'ClasseController@index')->name('classi');
Route::post('classi', 'ClasseController@create')->name('create_classi');
Route::get('classi/del/{classi_id}', 'ClasseController@delete')->name('delete_classi');
Route::get('classi/{classi_id}', 'ClasseController@show')->name('info_classi');


/*
 *  Routes dell'orario
 */
Route::get('orari', 'OrarioController@index')->name('orari');

Route::get('delete_orario/{orario_id}/{docente_id}', 'OrarioController@delete')->name('delete_orario');

Route::get('create_orario', 'OrarioController@create')->name('create_orari');
Route::get('show_orario_classe', 'OrarioController@show_orario_classe')->name('show_orario_classe');
Route::get('print_orario_classe', 'OrarioController@print_orario_classe')->name('print_orario_classe');

Route::get('orario', 'OrarioController@create_orario_doc')->name('create_orario_doc');
Route::post('create_orario_doc_add/{giorno}/{ora}', 'OrarioController@create_orario_doc_add')->name('create_orario_doc_add');

Route::get('orari/del/{orari_id}', 'OrarioController@delete')->name('delete_orari');
Route::get('orari/{orari_id}', 'OrarioController@show')->name('info_orari');



Route::get('sostituzioni', 'SostituzioneController@index')->name('sostituzioni');
Route::get('show_date_perm', 'SostituzioneController@show_date_perm')->name('show_date_perm');

Route::post('add_sostituzione', 'SostituzioneController@add_sostituzione')->name('add_sostituzione');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});
