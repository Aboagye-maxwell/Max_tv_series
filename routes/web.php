<?php

use App\Series;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller;
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

Route::get('/', function () {

    $series = Series::orderBy('updated_at','desc')->paginate(24);

//    dd($series);

    $data = array('series'=>$series,);
//    dd($data);

    return view('pages.series')->with($data);
});

Route::resource('series','SeriesController');

Route::resource('seasons','SeasonsController');

Route::resource('episodes','EpisodesController');

Route::resource('posts','PostController');

Route::get('download/{file}', 'EpisodesController@getZipDownload');

Route::get('/edit/series/{id}', 'SeriesController@edit');

Route::get('/edit/season/{id}', 'SeasonsController@edit');

Route::get('/edit/episode/{id}', 'EpisodesController@edit');

Route::get('/series-search','SeriesController@getSeries');

Route::get('/home', 'HomeController@index')->name('home');

