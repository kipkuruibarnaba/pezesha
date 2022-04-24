<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Models\Products;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\MarvelController;

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
// Route::get('/', function () {
//     (new Products())->importToDb();
//     dd('done');
//     return view('welcome');
// });
Route::get('/', [TodosController::class, 'index']);

Auth::routes();
Route::group(['prefix'=>'admin',  'middleware'=>'auth'], function (){

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/create/file', [SalesController::class,'create'])->name('create.file');
    Route::post('/product/store', [SalesController::class,'upload_csv_records'])->name('sale.store');
    Route::get('/item/edit/{id}', [SalesController::class,'edit'])->name('item.edit');
    Route::post('/item/update/{id}', [SalesController::class,'update'])->name('item.update');
    Route::get('/item/delete/{id}', [SalesController::class,'destroy'])->name('item.delete');

    Route::get('/list/characters', [MarvelController::class,'displaycharacters'])->name('displaycharacters');
});
