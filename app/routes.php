<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('campaigns', 'HomeController@campaigns');

Route::post('sendMany','SendmailController@sendMany');

//webhook
//Route::post('webhook/delivered','WebhookController@delivered');

//营销活动
Route::post('campaignslist','ApiController@campaigns');
Route::post('campaigncreat','ApiController@campaignCreat');
Route::post('campaignUpdate','ApiController@campaignUpdate');
Route::get('campaignDelete/{id}','ApiController@campaignDelete');