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
| routes are loaded by the Routedealsponsor within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('lang/{lang}', function ($lang){
   $locale = $lang;
   session(['lang' => $locale]);
   App::setLocale($lang);
   $lang = App::getlocale();

   return redirect()->back();
})->name('setlang');


Route::get('/', function () {
    return redirect('/login');
});


Auth::routes();
// Route::post('reset-password/{token}', 'ResetPasswordController@resetPassword')->name('resetPassword');
Route::group(['middleware' => 'auth'], function () {

    Route::resource('roles','RoleController');
    
    //route public
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile/{id}', 'HomeController@profile')->name('profile');
    Route::post('/profile/editprofile', 'HomeController@editprofile')->name('editprofile');

    // routes for admins management
    Route::get('/admins', 'AdminsController@index')->name('admins');
    Route::get('/admins/add/', 'AdminsController@add')->name('addadmin');
    Route::post('/admins/update/', 'AdminsController@store')->name('storeadmin');
    Route::get('/admins/edit/{id}', 'AdminsController@edit')->name('editadmin');
    Route::get('/admins/delete/{id}', 'AdminsController@destroy')->name('destroyadmin');
    Route::post('/admins/deleteall', 'AdminsController@deleteall')->name('adminsdeleteall');
    
    // routes for countries management
    Route::get('/countries', 'CountriesController@index')->name('countries');
    Route::get('/countries/add/', 'CountriesController@add')->name('addcountrie');
    Route::post('/countries/update/', 'CountriesController@store')->name('storecountrie');
    Route::get('/countries/edit/{id}', 'CountriesController@edit')->name('editcountrie');
    Route::get('/countries/delete/{id}', 'CountriesController@destroy')->name('destroycountrie');
    Route::post('/countries/deleteall', 'CountriesController@deleteall')->name('countriesdeleteall');
    Route::get('/countries/{id}/areas', 'CountriesController@areas')->name('countryareas');

    // routes for cities management
    Route::get('/cities', 'CitiesController@index')->name('cities');
    Route::get('/cities/add/', 'CitiesController@add')->name('addcitie');
    Route::post('/cities/update/', 'CitiesController@store')->name('storecitie');
    Route::get('/cities/edit/{id}', 'CitiesController@edit')->name('editcitie');
    Route::get('/cities/delete/{id}', 'CitiesController@destroy')->name('destroycitie');
    Route::post('/cities/deleteall', 'CitiesController@deleteall')->name('citiesdeleteall');
    Route::get('/cities/{id}/areas', 'CitiesController@areas')->name('cityareas');

    // routes for areas management
    Route::get('/areas', 'AreasController@index')->name('areas');
    Route::get('/areas/add/', 'AreasController@add')->name('addarea');
    Route::post('/areas/update/', 'AreasController@store')->name('storearea');
    Route::get('/areas/edit/{id}', 'AreasController@edit')->name('editarea');
    Route::get('/areas/delete/{id}', 'AreasController@destroy')->name('destroyarea');
    Route::post('/areas/deleteall', 'AreasController@deleteall')->name('areasdeleteall');

    // routes for packages management
    Route::get('/packages', 'PackagesController@index')->name('packages');
    Route::get('/packages/add/', 'PackagesController@add')->name('addpackage');
    Route::post('/packages/update/', 'PackagesController@store')->name('storepackage');
    Route::get('/packages/edit/{id}', 'PackagesController@edit')->name('editpackage');
    Route::get('/packages/delete/{id}', 'PackagesController@destroy')->name('destroypackage');
    Route::post('/packages/deleteall', 'PackagesController@deleteall')->name('packagesdeleteall');

    // routes for categories management
    Route::get('/categories', 'CategoriesController@index')->name('categories');
    Route::get('/categories/add/', 'CategoriesController@add')->name('addcategorie');
    Route::post('/categories/update/', 'CategoriesController@store')->name('storecategorie');
    Route::get('/categories/edit/{id}', 'CategoriesController@edit')->name('editcategorie');
    Route::get('/categories/delete/{id}', 'CategoriesController@destroy')->name('destroycategorie');
    Route::post('/categories/deleteall', 'CategoriesController@deleteall')->name('categoriesdeleteall');

    // routes for departments management
    Route::get('/departments', 'SubCategoriesController@index')->name('departments');
    Route::get('/departments/add/', 'SubCategoriesController@add')->name('adddepartment');
    Route::post('/departments/update/', 'SubCategoriesController@store')->name('storedepartment');
    Route::get('/departments/edit/{id}', 'SubCategoriesController@edit')->name('editdepartment');
    Route::get('/departments/delete/{id}', 'SubCategoriesController@destroy')->name('destroydepartment');
    Route::post('/departments/deleteall', 'SubCategoriesController@deleteall')->name('departmentsdeleteall');

     // routes for companies management
     Route::get('/companies', 'CompaniesController@index')->name('companies');
     Route::get('/companies/add/', 'CompaniesController@add')->name('addcompanie');
     Route::post('/companies/update/', 'CompaniesController@store')->name('storecompanie');
     Route::get('/companies/edit/{id}', 'CompaniesController@edit')->name('editcompanie');
     Route::get('/companies/delete/{id}', 'CompaniesController@destroy')->name('destroycompanie');
     Route::post('/companies/deleteall', 'CompaniesController@deleteall')->name('companiesdeleteall');

    // routes for advertisements management
    Route::get('/advertisements', 'AdvertisementsController@index')->name('advertisements');
    Route::get('/advertisements/add/', 'AdvertisementsController@add')->name('addadvertisement');
    Route::post('/advertisements/update/', 'AdvertisementsController@store')->name('storeadvertisement');
    Route::get('/advertisements/edit/{id}', 'AdvertisementsController@edit')->name('editadvertisement');
    Route::get('/packagedetail/{id}', 'AdvertisementsController@packagedetail')->name('packagedetail');
    Route::get('/advertisements/delete/{id}', 'AdvertisementsController@destroy')->name('destroyadvertisement');
    Route::post('/advertisements/deleteall', 'AdvertisementsController@deleteall')->name('advertisementsdeleteall');
    

    // routes for profileadvertisements management
    Route::get('/profileadvertisements', 'AdvertisementsController@indexprofile')->name('profileadvertisements');
    Route::get('/profileadvertisements/add/', 'AdvertisementsController@addprofile')->name('addprofileadvertisement');
    Route::post('/profileadvertisements/update/', 'AdvertisementsController@storeprofile')->name('storeprofileadvertisement');
    Route::get('/profileadvertisements/edit/{id}', 'AdvertisementsController@editprofile')->name('editprofileadvertisement');
    Route::get('/profileadvertisements/delete/{id}', 'AdvertisementsController@destroy')->name('destroyprofileadvertisement');
    Route::post('/profileadvertisements/deleteall', 'AdvertisementsController@deleteall')->name('profileadvertisementsdeleteall');

    // routes for sponsors management
    Route::get('/sponsors', 'SponsorsController@index')->name('sponsors');
    Route::get('/sponsors/add/', 'SponsorsController@add')->name('addsponsor');
    Route::post('/sponsors/update/', 'SponsorsController@store')->name('storesponsor');
    Route::get('/sponsors/edit/{id}', 'SponsorsController@edit')->name('editsponsor');
    Route::get('/sponsors/delete/{id}', 'SponsorsController@destroy')->name('destroysponsor');
    Route::post('/sponsors/deleteall', 'SponsorsController@deleteall')->name('sponsorsdeleteall');


    
    // routes for users management
    Route::get('/users', 'UsersController@index')->name('users');
    Route::post('/users/update/', 'UsersController@store')->name('storeuser');
    Route::get('/users/add', 'UsersController@add')->name('adduser');
    Route::get('/users/edit/{id}', 'UsersController@edit')->name('edituser');
    Route::get('/users/userstatus/{id}', 'UsersController@changestatus')->name('userstatus');
    Route::get('/users/delete/{id}', 'UsersController@destroy')->name('destroyuser');
    Route::post('/users/deleteall', 'UsersController@deleteall')->name('usersdeleteall');
    Route::get('/users/orders/{id}', 'UsersController@orders')->name('userorders');

    
    //  routes for contact_us management
    //  routes for contact_us management
    Route::get('/contact_us', 'ContactsController@index')->name('contacts');
    Route::get('/contacts/delete/{id}', 'ContactsController@destroy')->name('destroycontact');
    Route::post('/contacts/deleteall', 'ContactsController@deleteall')->name('contactsdeleteall');


    // routes for reports management
    Route::get('/reports', 'ReportsController@index')->name('reports');
    Route::post('/reports', 'ReportsController@search')->name('reportfilter');
    // Route::get('/reports/reportfilter', 'ReportsController@reportfilter')->name('reportfilter');
    Route::get('/reports/reportdetail/{id}', 'ReportsController@show')->name('reportdetail');
    
    // routes for settings management
    Route::get('/settings/{type}', 'HomeController@settings')->name('settings');
    Route::get('/settings/add/{type}', 'HomeController@add')->name('addsetting');
    Route::post('/settings/store', 'HomeController@store')->name('storesetting');
    Route::get('/settings/edit/{type}', 'HomeController@edit')->name('editsetting');
    Route::put('/settings/edit/{id}', 'HomeController@editsettings')->name('editsettings');
    Route::get('/settings/delete/{id}', 'HomeController@destroy')->name('destroysetting');
    Route::post('/settings/deleteall', 'HomeController@deleteall')->name('settingsdeleteall');
    Route::post('/editprofile', 'HomeController@editprofile')->name('editprofile');
    
    Route::get('/token/{token}','HomeController@savetoken')->name('savetoken');
    // routes for notifications management
    Route::post('/notification/get','NotificationController@get');
    Route::get('/MarkAllSeen' ,'Controller@AllSeen')->name('MarkAllSeen');
    
     // routes for messages management by Antonios hosny for hala company
     Route::get('/messages', 'HomeController@messages')->name('messages');
     Route::post('/messages/send', 'HomeController@send')->name('send_messages');

    //route for ajax 

});



