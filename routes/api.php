<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get_all_invoice', [InvoiceController::class, 'get_all_invoice']);
Route::get('/search_invoice', [InvoiceController::class, 'search_invoice']);
Route::get('/createInvoice', [InvoiceController::class, 'createInvoice']);
Route::get('/customers', [CustomerController::class, 'allCustomers']);
Route::get('/products', [ProductController::class, 'allProducts']);
Route::post('/addInvoice', [InvoiceController::class, 'addInvoice']);
Route::get('/showInvoice/{id}', [InvoiceController::class, 'showInvoice']);
Route::get('/editInvoice/{id}', [InvoiceController::class, 'editInvoice']);
Route::post('/updateInvoice/{id}', [InvoiceController::class, 'updateInvoice']);
Route::get('/deleteInvoiceItem/{id}', [InvoiceController::class, 'deleteItem']);
Route::get('/deleteInvoice/{id}', [InvoiceController::class, 'deleteInvoice']);
