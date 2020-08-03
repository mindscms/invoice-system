<?php

Route::get('/', 'InvoiceController@index')->name('index');


// Route::get('/invoice/index', ['as' => 'invoice.index', 'uses' => 'InvoiceController@index']);


Route::get('change-language/{locale}', ['as' => 'frontend_change_locale', 'uses' => 'GeneralController@changeLanguage']);

Route::get('invoice/print/{id}', ['as' => 'invoice.print', 'uses' => 'InvoiceController@print']);
Route::get('invoice/pdf/{id}', ['as' => 'invoice.pdf', 'uses' => 'InvoiceController@pdf']);
Route::get('invoice/send_to_email/{id}', ['as' => 'invoice.send_to_email', 'uses' => 'InvoiceController@send_to_email']);
Route::resource('invoice', 'InvoiceController');
