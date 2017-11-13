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

Route::get('admin_area', ['middleware' => 'admin', function () {
    //
}]);


Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');


/*-------------------------Chapter----------------------------*/
Route::get('addChapter', 'adminController@indexChapter');
Route::post('chapter', 'adminController@store');
Route::get('viewChapters', 'adminController@index');
Route::post('delete/{id}', 'adminController@delete');
Route::get('/chapter/{id}', 'studentController@show');

Route::post('/subChapter', 'adminController@add_subchapter');
Route::get('/viewSubChapters', 'adminController@indexSubChapter');


Route::get('chap/edit/{id}', 'adminController@editChap');
Route::post('chap/update/{id}', 'adminController@updateChap');


Route::get('sub/edit/{id}', 'adminController@editSub');
Route::post('sub/update/{id}', 'adminController@updateSub');


/*-------------------------Solution----------------------------*/

Route::get('addSolution', 'studentController@indexSolution');
Route::post('solution', 'studentController@storeSolution');
Route::get('solution/{id}', 'studentController@viewSolution');


Route::get('/adminSolution', 'adminController@adminSolution');
Route::get('/solution/good/{id}', 'adminController@good');
Route::get('/solution/bad/{id}', 'adminController@bad');










