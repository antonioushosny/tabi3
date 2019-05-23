<?php

use Illuminate\Http\Request;

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
Route::post('Advertisements', 'ApiController@Advertisements')->middleware('localization');
Route::post('Countries', 'ApiController@Countries')->middleware('localization');
Route::post('Cities', 'ApiController@Cities')->middleware('localization');
Route::post('login', 'ApiController@login')->middleware('localization');
Route::post('Register', 'ApiController@Register')->middleware('localization');
Route::post('editprofile', 'ApiController@editprofile')->middleware('localization');
Route::post('logout', 'ApiController@logout')->middleware('localization');
Route::post('forget_password', 'ApiController@forget_password')->middleware('localization');
Route::post('verify_code', 'ApiController@verify_code')->middleware('localization');
Route::post('reset_password', 'ApiController@reset_password')->middleware('localization');
Route::post('homePage', 'ApiController@homePage')->middleware('localization');
Route::post('NowDeals', 'ApiController@NowDeals')->middleware('localization');
Route::post('ComingDeals', 'ApiController@ComingDeals')->middleware('localization');
Route::post('PreviousDeals', 'ApiController@PreviousDeals')->middleware('localization');
Route::post('Categorys', 'ApiController@Categorys')->middleware('localization');
Route::post('SubCategorys', 'ApiController@SubCategorys')->middleware('localization');
Route::post('DealDetails', 'ApiController@DealDetails')->middleware('localization');
Route::post('Packages', 'ApiController@Packages')->middleware('localization');
Route::post('Charge', 'ApiController@Charge')->middleware('localization');
Route::post('ContactUs', 'ApiController@ContactUs')->middleware('localization');
Route::post('TermsConditions', 'ApiController@TermsConditions')->middleware('localization');
Route::post('Policy', 'ApiController@Policy')->middleware('localization');
Route::post('AboutUs', 'ApiController@AboutUs')->middleware('localization');
Route::post('AddTicket', 'ApiController@AddTicket')->middleware('localization');
Route::post('Favorite', 'ApiController@Favorite')->middleware('localization');
Route::post('MyFavorite', 'ApiController@MyFavorite')->middleware('localization');
Route::post('MyDeals', 'ApiController@MyDeals')->middleware('localization');
Route::post('ChargesHistory', 'ApiController@ChargesHistory')->middleware('localization');
Route::post('Awards', 'ApiController@Awards')->middleware('localization');
Route::post('Interests', 'ApiController@Interests')->middleware('localization');
Route::post('SaveInterests', 'ApiController@SaveInterests')->middleware('localization');
Route::post('AddAddress', 'ApiController@AddAddress')->middleware('localization');
Route::post('MyAddress', 'ApiController@MyAddress')->middleware('localization');
Route::post('DeleteAddress', 'ApiController@DeleteAddress')->middleware('localization');
Route::post('SubCategoryDeals', 'ApiController@SubCategoryDeals')->middleware('localization');

Route::Post('count_notification','ApiController@count_notification')->middleware('localization');
Route::Post('get_notification','ApiController@get_notification')->middleware('localization');

Route::Post('send_notification','ApiController@send_notification')->middleware('localization');

// for notifications 

Route::Post('make_as_read','ApiController@make_as_read')->middleware('localization');
/////////


//this for test 
Route::Post('send_notifications','ApiController@send_notifications');
Route::Post('webnotifications','ApiController@webnotifications');

//api for web 
Route::Post('weblogin','Auth\LoginController@login')->middleware('localization');

