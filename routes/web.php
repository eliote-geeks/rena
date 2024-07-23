<?php

use App\Models\Mutualist;
use App\Models\AmountYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MutualistController;
use App\Http\Controllers\AmountYearController;
use App\Http\Controllers\SpecialistController;

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


// uSERS
Route::get('users-list',[SpecialistController::class,'usersList'])->name('usersList');
Route::get('create-user',[SpecialistController::class,'createUser'])->name('create-user');
Route::post('edit-user/{user}',[SpecialistController::class,'editUser'])->name('editUser');
Route::get('delete-user/{user}',[SpecialistController::class,'delete'])->name('deletetUser');
Route::post('create-user',[SpecialistController::class,'newUser'])->name('newUser');
Route::get('close-year/{year}',[AmountYearController::class,'closeYear'])->name('closeYear');
Route::get('close-year-amount',[AmountYearController::class,'closeYearAmount'])->name('closeYearAmount');



Route::get('add-Card/{mutual}',[MutualistController::class,'addCart'])->name('add-Cart');
Route::get('search-by-card/',[MutualistController::class,'searchcard'])->name('search-by-Cart');
Route::post('search-by-card',[MutualistController::class,'searchByCard'])->name('searchByCard');
Route::post('add-Card/{mutual}',[MutualistController::class,'addCardPost'])->name('addCardPost');
Route::get('mutualist/search',[MutualistController::class,'search'])->name('searchMutualist');
Route::get('mutualist/transaction',[MutualistController::class,'transaction'])->name('transactionMutualistList');
Route::get('mutualist/history',[MutualistController::class,'history'])->name('history-day-transaction');
Route::get('mutualist/new-transaction',[MutualistController::class,'newTransaction'])->name('newTransaction');
Route::resource('mutualist',MutualistController::class);
Route::resource('amountYear', AmountYearController::class);
