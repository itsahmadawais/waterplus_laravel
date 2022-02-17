<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\BillableItemsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SectorsController;
use App\Http\Controllers\PDFController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('dashboard',[DashboardController::class,'index']);


    Route::get('customers',[CustomerController::class,'index']);
    Route::get('customers/add',[CustomerController::class,'create']);
    Route::post('customers/{sector_id?}',[CustomerController::class,'store']);
    Route::put('customers/password/{id}',[CustomerController::class,'password']);
    Route::put('customers/{id}',[CustomerController::class,'update']);
    Route::get('customers/filter/{type}|{id}',[CustomerController::class,'filter']);
    Route::delete('customers/{id}',[CustomerController::class,'delete']);

    Route::get('purchases',[PurchaseController::class,'index']);
    Route::get('purchases/add',[PurchaseController::class,'create']);
    Route::post('purchases',[PurchaseController::class,'store']);
    Route::delete('purchases/{id}',[PurchaseController::class,'delete']);

    Route::get('debt/{id}',[DebtController::class,'get']);
    Route::put('debt',[DebtController::class,'pay']);

    Route::get('expenses',[ExpensesController::class,'index']);
    Route::get('expenses/add',[ExpensesController::class,'create']);
    Route::post('expenses',[ExpensesController::class,'store']);
    Route::get('expenses/{id}',[ExpensesController::class,'view']);
    Route::delete('expenses/{id}',[ExpensesController::class,'delete']);

    Route::post('billableitems',[BillableItemsController::class,'create']);
    Route::delete('billableitems/{id}',[BillableItemsController::class,'delete']);

    Route::get('feedbacks',[FeedbackController::class,'index']);
    Route::delete('feedbacks/{id}',[FeedbackController::class,'delete']);

    Route::get('sectors',[SectorsController::class,'index']);
    Route::get('sectors/add',[SectorsController::class,'create']);
    Route::post('sectors',[SectorsController::class,'store']);
    Route::get('sectors/{id}',[SectorsController::class,'edit']);
    Route::put('sectors',[SectorsController::class,'update']);
    Route::delete('sectors/{id}',[SectorsController::class,'delete']);

    Route::get('custom-revenue',[DashboardController::class,'custom']);
    Route::post('custom-revenue',[DashboardController::class,'customCalculator']);

    Route::post('pdf/customer',[PDFController::class,'customers']);
    
});
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('feedbacks/create',[FeedbackController::class,'create']);
    Route::post('feedbacks',[FeedbackController::class,'store']);
});
Route::middleware(['auth', 'role:admin|customer'])->group(function () {
    Route::get('customers/{id}',[CustomerController::class,'view']);
    Route::get('purchases/{id}',[PurchaseController::class,'record']);
});