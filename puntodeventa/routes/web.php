<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ReportController;

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

// Route::get('/prueba', function(){
// 	return view('layouts.prueba');
// });

/**
	Rutas para la seccion de categorias
**/
Route::get('/categories',[CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create',[CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories',[CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categories',[CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}',[CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');
Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
/*Final de rutas de categorias*/

/**
	Rutas para la seccion de providers
**/
Route::get('/providers',[ProviderController::class, 'index'])->name('providers');
Route::get('/providers/create',[ProviderController::class,'create'])->name('providers.create');
Route::post('/providers',[ProviderController::class, 'store'])->name('providers.store');
Route::get('/providers/{provider}',[ProviderController::class, 'edit'])->name('providers.edit');
Route::get('/providers/show/{provider}',[ProviderController::class, 'show'])->name('providers.show');
Route::put('/providers/{provider}',[ProviderController::class, 'update'])->name('providers.update');
Route::delete('/providers/{provider}',[ProviderController::class, 'destroy'])->name('providers.destroy');
/*Final de las rutas de providers*/


/**
	Rutas para la seccion de productos
**/
Route::get('products',[ProductController::class, 'index'])->name('products');
Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('/products',[ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}',[ProductController::class, 'edit'])->name('products.edit');
Route::get('/products/show/{product}',[ProductController::class, 'show'])->name('products.show');
Route::put('/products/{product}',[ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}',[ProductController::class, 'destroy'])->name('products.destroy');
//cambiar el estatus
Route::get('/change_status/products/{product}',[ProductController::class, 'change_status'])->name('products.change');

/*	Final de la ruta de productos	*/

/**
	Rutas para la seccion de clientes
**/
Route::get('/clients',[ClientController::class, 'index'])->name('clients');
Route::get('/clients/create',[ClientController::class, 'create'])->name('clients.create');
Route::post('/clients',[ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}',[ClientController::class, 'edit'])->name('clients.edit');
Route::get('/clients/show/{client}',[ClientController::class, 'show'])->name('clients.show');
Route::put('/clients/{client}',[ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}',[ClientController::class, 'destroy'])->name('clients.destroy');
//final para la seccion de clientes


/**
	Rutas para la seccion de compras
**/
Route::get('/purcharses',[PurchaseController::class, 'index'])->name('purcharses');
Route::get('/purcharses/create',[PurchaseController::class, 'create'])->name('purcharses.create');
Route::post('/purcharses',[PurchaseController::class, 'store'])->name('purcharses.store');
Route::get('/purcharses/{purchase}',[PurchaseController::class, 'edit'])->name('purcharses.edit');
Route::get('/purcharses/show/{purchase}',[PurchaseController::class, 'show'])->name('purcharses.show');
Route::put('/purcharses/{purchase}',[PurchaseController::class, 'update'])->name('purcharses.update');
Route::delete('/purcharses/{purchase}',[PurchaseController::class, 'destroy'])->name('purcharses.destroy');
//ruta para descargar el PDF
Route::get('/purcharses/pdf/{purchase}',[PurchaseController::class, 'pdf'])->name('purcharses.pdf');
Route::get('/purcharses/upload/{purchase}',[PurchaseController::class, 'upload'])->name('purcharses.upload');
Route::get('change_status/purcharses/{purchase}',[PurchaseController::class,'change_status'])->name('purcharses.change');
//Final para la seccion de compras


/**
	Rutas para la seccion de sales
**/
Route::get('/sales',[SaleController::class, 'index'])->name('sales');
Route::get('/sales/create',[SaleController::class, 'create'])->name('sales.create');
Route::post('/sales',[SaleController::class, 'store'])->name('sales.store');
Route::get('/sales/{sale}',[SaleController::class, 'edit'])->name('sales.edit');
Route::get('/sales/show/{sale}',[SaleController::class, 'show'])->name('sales.show');
Route::put('/sales/{sale}',[SaleController::class, 'update'])->name('sales.update');
Route::delete('/sales/{sale}',[SaleController::class,'destroy'])->name('sales.destroy');
//la ruta de abajo es para imprimir el PDF que tiene todos los datos de la Venta
Route::get('/sales/pdf/{sale}',[SaleController::class, 'pdf'])->name('sales.pdf');
//la ruta de abajo es para poder imprimir la nota
Route::get('/sales/print/{sale}',[SaleController::class, 'print'])->name('sales.print');
Route::get('/change_status/sales/{sale}',[SaleController::class,'change_status'])->name('sales.change');
//Final de la seccion de sales

/**
	Seccion para los reportes
**/
Route::get('/sales/report_day',[ReportController::class, 'report_day'])->name('reports.day');
Route::get('/sales/report_date',[ReportController::class, 'report_date'])->name('reports.date');
Route::post('/sales/reports_results',[ReportController::class, 'report_results'])->name('reports.results');
//fin de la seccion para los reportes


/**
	Rutas para la seccion de business
**/
Route::resource('business', BusinessController::class)->only([
	'index','update'
]);
//Fin de la seccion business

/**
	Rutas para la seccion de printer
**/
Route::resource('printer', PrinterController::class)->only([
	'index', 'update'
]);
//Fin de la seccion printer

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');