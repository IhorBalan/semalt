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

Route::get('/', 'ViewController@index')->name('index');
Route::get('/migrations', 'ViewController@migrations')->name('migrations');
Route::get('/task2', 'ViewController@task2')->name('task2');
Route::get('/task3', 'ViewController@task3')->name('task3');
Route::get('/task4', 'ViewController@task4')->name('task4');

