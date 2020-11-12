<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('mediexperts-academy/domaines', 'mediexperts_academy\DomaineController@index')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::post('mediexperts-academy/domaines', 'mediexperts_academy\DomaineController@store')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::put('mediexperts-academy/domaines/update/{id}', 'mediexperts_academy\DomaineController@update')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::delete('mediexperts-academy/domaines/delete/{id}', 'mediexperts_academy\DomaineController@destroy')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mediexperts-academy/domaines/{id}', 'mediexperts_academy\DomaineController@show')->where( 'path', '([A-z\d\-\/_.]+)' );

Route::get('mediexperts-academy/themes', 'mediexperts_academy\ThemeController@index')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::post('mediexperts-academy/themes', 'mediexperts_academy\ThemeController@store')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::put('mediexperts-academy/themes/update/{id}', 'mediexperts_academy\ThemeController@update')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::delete('mediexperts-academy/themes/delete/{id}', 'mediexperts_academy\ThemeController@destroy')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mediexperts-academy/themes/{id}', 'mediexperts_academy\ThemeController@show')->where( 'path', '([A-z\d\-\/_.]+)' );

Route::get('mediexperts-academy/formations', 'mediexperts_academy\FormationController@index')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::post('mediexperts-academy/formations', 'mediexperts_academy\FormationController@store')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::put('mediexperts-academy/formations/update/{id}', 'mediexperts_academy\FormationController@update')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::delete('mediexperts-academy/formations/delete/{id}', 'mediexperts_academy\FormationController@destroy')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mediexperts-academy/formations/{id}', 'mediexperts_academy\FormationController@show')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mediexperts-academy/formationscount', 'mediexperts_academy\FormationController@getcount')->where( 'path', '([A-z\d\-\/_.]+)' );

Route::get('mediexperts-academy/participants', 'mediexperts_academy\ParticipantController@index')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::post('mediexperts-academy/participants', 'mediexperts_academy\ParticipantController@store')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::put('mediexperts-academy/participants/update/{id}', 'mediexperts_academy\ParticipantController@update')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::delete('mediexperts-academy/participants/delete/{id}', 'mediexperts_academy\ParticipantController@destroy')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mediexperts-academy/participants/{id}', 'mediexperts_academy\ParticipantController@show')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mediexperts-academy/participantscount', 'mediexperts_academy\ParticipantController@getcount')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mediexperts-academy/newpar', 'mediexperts_academy\ParticipantController@getlastsparticipants')->where( 'path', '([A-z\d\-\/_.]+)' );

Route::get('mediexperts-academy/contact', 'mediexperts_academy\ContactController@index')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::post('mediexperts-academy/contact', 'mediexperts_academy\ContactController@store')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::put('mediexperts-academy/contact/update/{id}', 'mediexperts_academy\ContactController@update')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::delete('mediexperts-academy/contact/delete/{id}', 'mediexperts_academy\ContactController@destroy')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mediexperts-academy/contact/{id}', 'mediexperts_academy\ContactController@show')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mediexperts-academy/newmsg', 'mediexperts_academy\ContactController@getlastsmessages')->where( 'path', '([A-z\d\-\/_.]+)' );

/////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('mysys/domaines', 'mysys\MysysDomaineController@index')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::post('mysys/domaines', 'mysys\MysysDomaineController@store')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::put('mysys/domaines/update/{id}', 'mysys\MysysDomaineController@update')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::delete('mysys/domaines/delete/{id}', 'mysys\MysysDomaineController@destroy')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/domaines/{id}', 'mysys\MysysDomaineController@show')->where( 'path', '([A-z\d\-\/_.]+)' );

Route::get('mysys/themes', 'mysys\MysysThemeController@index')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::post('mysys/themes', 'mysys\MysysThemeController@store')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::put('mysys/themes/update/{id}', 'mysys\MysysThemeController@update')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::delete('mysys/themes/delete/{id}', 'mysys\MysysThemeController@destroy')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/themes/{id}', 'mysys\MysysThemeController@show')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/themesbydomaine/{domaine_id}', 'mysys\MysysThemeController@getThemeByDomaine')->where( 'path', '([A-z\d\-\/_.]+)' );

Route::get('mysys/formations', 'mysys\MysysFormationController@index')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::post('mysys/formations', 'mysys\MysysFormationController@store')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::put('mysys/formations/update/{id}', 'mysys\MysysFormationController@update')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::delete('mysys/formations/delete/{id}', 'mysys\MysysFormationController@destroy')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/formations/{id}', 'mysys\MysysFormationController@show')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/formationscount', 'mysys\MysysFormationController@getcount')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/formationsbytheme/{theme_id}', 'mysys\MysysFormationController@getFormationsByTheme')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/getglobalevent', 'mysys\MysysFormationController@getGlobalEvent')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/formationsbycat/{cat}', 'mysys\MysysFormationController@getFormationsByCat')->where( 'path', '([A-z\d\-\/_.]+)' );

Route::get('mysys/participants', 'mysys\MysysParticipantController@index')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::post('mysys/participants', 'mysys\MysysParticipantController@store')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::put('mysys/participants/update/{id}', 'mysys\MysysParticipantController@update')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::delete('mysys/participants/delete/{id}', 'mysys\MysysParticipantController@destroy')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/participants/{id}', 'mysys\MysysParticipantController@show')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/participantscount', 'mysys\MysysParticipantController@getcount')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/newpar', 'mysys\MysysParticipantController@getlastsparticipants')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/parperday', 'mysys\MysysParticipantController@getParticipantPerDay')->where( 'path', '([A-z\d\-\/_.]+)' );

Route::get('mysys/contact', 'mysys\MysysContactController@index')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::post('mysys/contact', 'mysys\MysysContactController@store')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::put('mysys/contact/update/{id}', 'mysys\MysysContactController@update')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::delete('mysys/contact/delete/{id}', 'mysys\MysysContactController@destroy')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/contact/{id}', 'mysys\MysysContactController@show')->where( 'path', '([A-z\d\-\/_.]+)' );
Route::get('mysys/newmsg', 'mysys\MysysContactController@getlastsmessages')->where( 'path', '([A-z\d\-\/_.]+)' );


// Route::group(['prefix' => 'domaine'], function () {
//     Route::post('create', 'DomaineController@create');
//     Route::post('update/{id}', 'DomaineController@update');
//     Route::delete('delete/{id}', 'DomaineController@delete');
// });