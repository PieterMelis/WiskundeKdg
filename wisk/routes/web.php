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





/*-------------------------Solution----------------------------*/

Route::get('addSolution', 'studentController@indexSolution');
Route::post('solution', 'studentController@storeSolution');















