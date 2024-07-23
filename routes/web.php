<?php

use App\Http\Controllers\MutualistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::post('welcome/post',function(Request $request){
    dd($request->all());
})->name('welcomePost');


Route::get('mutualist/search',[MutualistController::class,'search'])->name('searchMutualist');
Route::get('mutualist/transaction',[MutualistController::class,'transaction'])->name('transactionMutualistList');
Route::get('mutualist/history',[MutualistController::class,'history'])->name('history-day-transaction');
Route::get('mutualist/new-transaction',[MutualistController::class,'newTransaction'])->name('newTransaction');
Route::resource('mutualist',MutualistController::class);
