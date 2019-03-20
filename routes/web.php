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

//Route::get('/', function () {
//    return view('welcome');
//});



Auth::routes();

Route::get('/', 'WelcomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/djs', 'DjsController@index')->name('djs');
Route::get('/live-musicians', 'LiveMusiciansController@index')->name('live-musicians');
Route::resource('projects','ProjectController');
Route::resource('categories','CategoryController');
Route::resource('menus','MenuController');
Route::resource('boxes','BoxController');
Route::resource('jobs','JobController');
Route::resource('pages','PageController');

Route::get('img/portfolio/{filename}', function ($filename)
{
    $path = storage_path('app/portfolio/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::post('/getmsg','AjaxController@index');

