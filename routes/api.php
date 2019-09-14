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
Route::post('Login', 'ApiController@Login')->middleware('localization');
Route::post('Register', 'ApiController@Register')->middleware('localization');
Route::post('EditProfile', 'ApiController@EditProfile')->middleware('localization');
Route::post('Logout', 'ApiController@Logout')->middleware('localization');
Route::post('ForgetPassword', 'ApiController@ForgetPassword')->middleware('localization');
Route::post('VerifyCode', 'ApiController@VerifyCode')->middleware('localization');
Route::post('ResetPassword', 'ApiController@ResetPassword')->middleware('localization');

Route::post('HomePage', 'ApiController@HomePage')->middleware('localization');

Route::post('Departments', 'ApiController@Departments')->middleware('localization');
Route::post('Categories', 'ApiController@Categories')->middleware('localization');

Route::post('Offic', 'ApiController@Offic')->middleware('localization');
Route::post('Forms', 'ApiController@Forms')->middleware('localization');
Route::post('AddEditForms', 'ApiController@AddEditForms')->middleware('localization');
Route::post('DeleteForm', 'ApiController@DeleteForm')->middleware('localization');
Route::post('Notes', 'ApiController@Notes')->middleware('localization');
Route::post('AddEditNotes', 'ApiController@AddEditNotes')->middleware('localization');
Route::post('DeleteNote', 'ApiController@DeleteNote')->middleware('localization');

Route::post('Box', 'ApiController@Box')->middleware('localization');
Route::post('Payments', 'ApiController@Payments')->middleware('localization');
Route::post('AddEditPayments', 'ApiController@AddEditPayments')->middleware('localization');
Route::post('DeletePayment', 'ApiController@DeletePayment')->middleware('localization');
Route::post('PaymentDetails', 'ApiController@PaymentDetails')->middleware('localization');
Route::post('AddEditPaymentDetails', 'ApiController@AddEditPaymentDetails')->middleware('localization');
Route::post('DeletePaymentDetails', 'ApiController@DeletePaymentDetails')->middleware('localization');

Route::post('Expenses', 'ApiController@Expenses')->middleware('localization');
Route::post('AddEditExpense', 'ApiController@AddEditExpense')->middleware('localization');
Route::post('DeleteExpense', 'ApiController@DeleteExpense')->middleware('localization');

Route::post('StaticPages', 'ApiController@StaticPages')->middleware('localization');

Route::post('ContactUs', 'ApiController@ContactUs')->middleware('localization');
Route::post('TermsConditions', 'ApiController@TermsConditions')->middleware('localization');
Route::post('Policy', 'ApiController@Policy')->middleware('localization');
Route::post('AboutUs', 'ApiController@AboutUs')->middleware('localization');
Route::post('Informations', 'ApiController@Informations')->middleware('localization');



Route::Post('count_notification','ApiController@count_notification')->middleware('localization');
Route::Post('get_notification','ApiController@get_notification')->middleware('localization');



