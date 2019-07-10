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



Auth::routes();

Route::get('/', 'FE\WelcomeController@index')->name('index');
Route::get('/home', 'FE\HomeController@index')->name('home');
Route::get('/djs', 'FE\DjsController@index')->name('djs');
Route::get('/live-musicians', 'FE\LiveMusiciansController@index')->name('live-musicians');
Route::get('/gallery/{chapter?}', 'FE\GalleryController@index')->name('gallery');

//Chapter section


Route::resource('projects','Admin\ProjectController');
Route::resource('categories','Admin\CategoryController');
Route::resource('menus','Admin\MenuController');
Route::resource('boxes','Admin\BoxController');
Route::resource('jobs','Admin\JobController');
Route::resource('pages','Admin\PageController');

Route::delete('galleries/destroyGallery/{gallery}', 'Admin\GalleryAdminController@destroyGallery')->name('galleries.destroyGallery');
Route::resource('galleries','Admin\GalleryAdminController');

Route::post('image/do-upload', 'Admin\GalleryAdminController@doImageUpload');

Route::get('img/chapters/{dir}/{filename}', function ($dir, $filename)
{
    $path = storage_path('app/chapters/'. $dir .'/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('img/portfolio/{filename}', function ($filename)
{
    $path = storage_path('app/portfolio/'. $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::post('/new-project-order','Admin\AjaxController@index');
Route::post('/new-gallery-order','Admin\AjaxController@newGalleryOrder');

