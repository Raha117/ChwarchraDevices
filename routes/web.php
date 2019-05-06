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


Route::group(['middleware' => 'auth'], function(){
    Route::get('/','PagesController@home');
    Route::resource('/computers','ComputersController');
    Route::resource('/printers','PrintersController');
    Route::resource('/cameras','CamerasController');
    Route::get('/stats','PagesController@stats');
    Route::resource('/other_devices','OtherDevicesController');
    Route::resource('employees','EmployeesController');
    Route::resource('network_devices','NetworkDevicesController');
    Route::post('/employees/{employee}','EmployeesController@store_employee_devices');
    Route::post('/simcards','OtherDevicesController@simcards_store');
    Route::delete('/simcards/{simcards}','OtherDevicesController@simcards_destroy');
    Route::get('/simcards/{simcard}/edit','OtherDevicesController@edit_simcards');
    Route::patch('/simcards/{simcard}','OtherDevicesController@update_simcards');
    Route::get('/employees/{employee}/create','EmployeesController@create');
    Route::delete('/employees/{employee}/{device}','EmployeesController@destroy_employee_device');
    Route::get('/contact','PagesController@contact');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name("logout");
    Route::get('/accounts','PagesController@accounts');
    Route::post('/accounts','Auth\RegisterController@store_accounts');
    Route::delete('/accounts/{account}','Auth\RegisterController@destory_accounts');
    Route::get('/accounts/{account}/edit','Auth\RegisterController@edit_accounts');
    Route::patch('/accounts/{account}','Auth\RegisterController@update_accounts');

});
Auth::routes(['register' => false]);
/*
Route::get('/projects','PostsController@index');
Route::get('/projects/create','PostsController@create');
Route::get('/projects/{project}','PostsController@show');
Route::post('/projects','PostsController@store');
Route::get('/projects/{project}/edit','PostsContoller@edit');
Route::patch('/projects/{project}','PostsController@update');
Route::delete('/projects/{project}','PostsController@destroy');

*/



