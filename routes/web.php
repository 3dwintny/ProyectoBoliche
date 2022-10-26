<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

//Slider
Route::resource('slider', SliderController::class);
 //Route::get('home-slider','Admin\SliderController.index');
/*Route::post('home-slider','Admin\SliderController.show'); */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
