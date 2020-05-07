<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Admin\AdminController@index')->name('admin.index');

/*Users*/

Route::get('/users', 'Admin\UserController@index')->name('admin.user.index');
Route::get('/user/create', 'Admin\UserController@create')->name('admin.user.create');
Route::get('/user/edit/{id}', 'Admin\UserController@edit')->name('admin.user.edit');
Route::get('/user/show/{id}', 'Admin\UserController@show')->name('admin.user.show');
Route::post('/user/store', 'Admin\UserController@store')->name('admin.user.store');
Route::post('/user/update/{id}', 'Admin\UserController@update')->name('admin.user.update');
Route::get('/user/destroy/{id}', 'Admin\UserController@destroy')->name('admin.user.destroy');
Route::get('/user/{id}/events/', 'Admin\UserController@events')->name('admin.user.events');
Route::get('/user/{id}/calendar/', 'Admin\UserController@calendar')->name('admin.user.calendar');

/*Events*/

Route::get('/events', 'Admin\EventController@index')->name('admin.event.index');
Route::get('/event/create', 'Admin\EventController@create')->name('admin.event.create');
Route::get('/event/edit/{id}', 'Admin\EventController@edit')->name('admin.event.edit');
Route::get('/event/show/{id}', 'Admin\EventController@show')->name('admin.event.show');
Route::post('/event/store', 'Admin\EventController@store')->name('admin.event.store');
Route::post('/event/update/{id}', 'Admin\EventController@update')->name('admin.event.update');
Route::get('/event/destroy/{id}', 'Admin\EventController@destroy')->name('admin.event.destroy');

/*Calendar*/

Route::get('/calendar', 'Admin\CalendarController@index')->name('admin.calendar.index');

/*Notifications */

Route::post('/notification/store', 'Admin\NotificationController@store')->name('admin.notification.store');
Route::post('/notification/delete', 'Admin\NotificationController@delete')->name('admin.notification.delete');
Route::get('/notification/push', 'Admin\NotificationController@push')->name('admin.notification.push');
