<?php

use App\Notifications\doctornotify;
use App\User;
// use QRCode;

// namespace App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RoutedealProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('lang/{lang}', function ($lang){
   $locale = $lang;
   session(['lang' => $locale]);
   App::setLocale($lang);
   $lang = App::getlocale();
//    setcookie("cookie_lang", $lang, time() + (86400 * 30 * 12));
//    return $_COOKIE["cookie_lang"]; 
   return redirect()->back();
})->name('setlang');


Route::get('/', function () {
    return redirect('/login');
});


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::resource('roles','RoleController');
    
    //route public
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile/{id}', 'HomeController@profile')->name('profile');
    Route::post('/profile/editprofile', 'HomeController@editprofile')->name('editprofile');

    // routes for admins management
    Route::get('/admins', 'AdminsController@index')->name('admins');
    Route::post('/admins/update/', 'AdminsController@store')->name('editadmin');
    Route::post('/admins/add', 'AdminsController@store')->name('storeadmin');
    Route::get('/admins/delete/{id}', 'AdminsController@destroy')->name('destroyadmin');
    Route::post('/admins/deleteall', 'AdminsController@deleteall')->name('adminsdeleteall');

    // routes for countries management
    Route::get('/countries', 'CountriesController@index')->name('countries');
    Route::get('/countries/{id}/cities', 'CountriesController@cities')->name('countrycities');
    Route::post('/countries/update/', 'CountriesController@store')->name('editcountrie');
    Route::post('/countries/add', 'CountriesController@store')->name('storecountrie');
    Route::get('/countries/delete/{id}', 'CountriesController@destroy')->name('destroycountrie');
    Route::post('/countries/deleteall', 'CountriesController@deleteall')->name('countriesdeleteall');
    
    // routes for cities management
    Route::get('/cities', 'CitiesController@index')->name('cities');
    Route::post('/cities/update/', 'CitiesController@store')->name('editcitie');
    Route::post('/cities/add', 'CitiesController@store')->name('storecitie');
    Route::get('/cities/delete/{id}', 'CitiesController@destroy')->name('destroycitie');
    Route::post('/cities/deleteall', 'CitiesController@deleteall')->name('citiesdeleteall');
    
    // routes for categories management
    Route::get('/categories', 'CategoriesController@index')->name('categories');
    Route::get('/categories/{id}/subcategories', 'CategoriesController@subcategories')->name('categorysubcategories');
    Route::post('/categories/update/', 'CategoriesController@store')->name('editcategorie');
    Route::post('/categories/add', 'CategoriesController@store')->name('storecategorie');
    Route::get('/categories/delete/{id}', 'CategoriesController@destroy')->name('destroycategorie');
    Route::post('/categories/deleteall', 'CategoriesController@deleteall')->name('categoriesdeleteall');

     // routes for subcategory management
     Route::get('/subcategory', 'SubCategoriesController@index')->name('subcategories');
     Route::post('/subcategory/update/', 'SubCategoriesController@store')->name('editsubcategorie');
     Route::post('/subcategory/add', 'SubCategoriesController@store')->name('storesubcategorie');
     Route::get('/subcategories/delete/{id}', 'SubCategoriesController@destroy')->name('destroysubcategorie');
     Route::post('/subcategory/deleteall', 'SubCategoriesController@deleteall')->name('subcategoriesdeleteall');

    // routes for advertisements management
    Route::get('/advertisements', 'AdvertisementController@index')->name('advertisements');
    Route::post('/advertisements/update/', 'AdvertisementController@store')->name('editadvertisement');
    Route::post('/advertisements/add', 'AdvertisementController@store')->name('storeadvertisement');
    Route::get('/advertisements/delete/{id}', 'AdvertisementController@destroy')->name('destroyadvertisement');
    Route::post('/advertisements/deleteall', 'AdvertisementController@deleteall')->name('advertisementsdeleteall');

    // routes for deals management
    Route::get('/deals', 'DealsController@index')->name('deals');
    Route::get('/last_deals', 'DealsController@last')->name('last_deals');
    Route::get('/tickets/{id}', 'DealsController@tickets')->name('tickets');
    Route::post('/deals/update/', 'DealsController@store')->name('editdeal');
    Route::post('/deals/add', 'DealsController@store')->name('storedeal');
    Route::get('/deals/delete/{id}', 'DealsController@destroy')->name('destroydeal');
    Route::post('/deals/deleteall', 'DealsController@deleteall')->name('dealsdeleteall');

    Route::get('/statics/{type}', 'StaticsController@index')->name('statics');
    Route::post('/statics/update/', 'StaticsController@store')->name('editstatic');
    Route::post('/statics/add', 'StaticsController@store')->name('storestatic');
    Route::get('/statics/delete/{id}', 'StaticsController@destroy')->name('destroystatic');
    Route::post('/statics/deleteall', 'StaticsController@deleteall')->name('staticsdeleteall');

    // routes for awards management
    Route::get('/awards', 'AwardsController@index')->name('awards');
    Route::post('/awards/update/', 'AwardsController@store')->name('editaward');
    Route::post('/awards/add', 'AwardsController@store')->name('storeaward');
    Route::get('/awards/delete/{id}', 'AwardsController@destroy')->name('destroyaward');
    Route::post('/awards/deleteall', 'AwardsController@deleteall')->name('awardsdeleteall');

    // routes for interests management
    Route::get('/interests', 'InterestsController@index')->name('interests');
    Route::post('/interests/update/', 'InterestsController@store')->name('editinterest');
    Route::post('/interests/add', 'InterestsController@store')->name('storeinterest');
    Route::get('/interests/delete/{id}', 'InterestsController@destroy')->name('destroyinterest');
    Route::post('/interests/deleteall', 'InterestsController@deleteall')->name('interestsdeleteall');

    // routes for packages management
    Route::get('/packages', 'packagesController@index')->name('packages');
    Route::post('/packages/update/', 'packagesController@store')->name('editpackage');
    Route::post('/packages/add', 'packagesController@store')->name('storepackage');
    Route::get('/packages/delete/{id}', 'packagesController@destroy')->name('destroypackage');
    Route::post('/packages/deleteall', 'packagesController@deleteall')->name('packagesdeleteall');
    
    // routes for users management
    Route::get('/users', 'UsersController@index')->name('users');
    Route::post('/users/update/', 'UsersController@store')->name('edituser');
    Route::post('/users/add', 'UsersController@store')->name('storeuser');
    Route::get('/users/delete/{id}', 'UsersController@destroy')->name('destroyuser');
    Route::post('/users/deleteall', 'UsersController@deleteall')->name('usersdeleteall');
    Route::get('/users/deals/{id}', 'UsersController@deals')->name('userdeals');
    Route::get('/users/charges/{id}', 'UsersController@charges')->name('usercharges');

    //  routes for contact_us management
    // Route::get('/contact_us/cliens/{status}', 'ContactsController@indexclients')->name('contactsclients');
    Route::get('/contact_us/users/{status}', 'ContactsController@indexusers')->name('contactsusers');
    Route::post('/contacts/add', 'ContactsController@store')->name('editcontact');
    Route::get('/contacts/delete/{id}', 'ContactsController@destroy')->name('destroycontact');
    Route::post('/contacts/deleteall', 'ContactsController@deleteall')->name('contactdeleteall');

    // routes for reports management
    Route::get('/reports', 'ReportsController@index')->name('reports');
    Route::post('/reports', 'ReportsController@search')->name('searchreports');
    Route::get('/reports/charges', 'ReportsController@charges')->name('charges');
    Route::get('/reports/reportsdeals', 'ReportsController@reportsdeals')->name('reportsdeals');
    
    // routes for settings management
    Route::get('/settings', 'HomeController@settings')->name('settings');
    Route::put('/settings/edit/{id}', 'HomeController@editsettings')->name('editsettings');
    
    Route::get('/token/{token}','HomeController@savetoken')->name('savetoken');
    // routes for notifications management
    Route::post('/notification/get','NotificationController@get');
    Route::get('/MarkAllSeen' ,'Controller@AllSeen')->name('MarkAllSeen');
    
     // routes for messages management by Antonios hosny for hala company
     Route::get('/messages', 'HomeController@messages')->name('messages');
     Route::post('/messages/send', 'HomeController@send')->name('send_messages');

    //route for ajax 

});



