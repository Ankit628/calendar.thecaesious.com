<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Admin\AdminController@index')->name('admin.index');

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

