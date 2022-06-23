<?php

use App\Http\Controllers\CashCollectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CattleTypeController;
use App\Http\Controllers\CattleColorController;
use App\Http\Controllers\CostInfoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubDistrictController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TaxCollectionController;
use App\Models\TaxCollection;

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

Route::get('/', [RouteController::class, 'home']);

Route::get('/location', [RouteController::class, 'location'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->middleware('auth');

Route::get('/register/create', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/login/create', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store']);
Route::get('/logout', [SessionsController::class, 'destroy']);

Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/user/create', [UserController::class, 'create'])->middleware('auth', 'admin');
Route::post('/user', [UserController::class, 'store'])->middleware('auth', 'admin');
Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::patch('/user/{id}', [UserController::class, 'update'])->middleware('auth');
// Route::delete('/user/{id}', [UserController::class, 'destroy'])->middleware('auth', 'admin');

Route::get('/gettaxcollectorinfo/{id}', [UserController::class, 'getTaxCollectorInfo'])->middleware('auth');

Route::get('/taxcollection', [TaxCollectionController::class, 'index'])->middleware('auth');
Route::post('/taxcollection', [TaxCollectionController::class, 'store'])->middleware('auth');

Route::get('/cashcollection/receipt/create', [CashCollectionController::class, 'cashReceiptCreate'])->middleware('auth');
Route::post('/cashcollection/receipt', [CashCollectionController::class, 'cashReceiptStore'])->middleware('auth');
Route::get('/cashcollection/receivecash/create', [CashCollectionController::class, 'receiveCashCreate'])->middleware('auth');
Route::post('/cashcollection/receivecash', [CashCollectionController::class, 'receiveCashStore'])->middleware('auth');

Route::get('/district', [DistrictController::class, 'index'])->middleware('auth');
Route::get('/district/create', [DistrictController::class, 'create'])->middleware('auth');
Route::post('/district', [DistrictController::class, 'store'])->middleware('auth');
Route::get('/district/{id}', [DistrictController::class, 'show'])->middleware('auth');
Route::get('/district/{id}/edit', [DistrictController::class, 'edit'])->middleware('auth');
Route::patch('/district/{id}', [DistrictController::class, 'update'])->middleware('auth');
// Route::delete('/district/{id}', [DistrictController::class, 'destroy'])->middleware('auth', 'admin');

Route::get('/subdistrict', [SubDistrictController::class, 'index'])->middleware('auth');
Route::get('/subdistrict/create', [SubDistrictController::class, 'create'])->middleware('auth');
Route::post('/subdistrict', [SubDistrictController::class, 'store'])->middleware('auth');
Route::get('/subdistrict/{id}', [SubDistrictController::class, 'show'])->middleware('auth');
Route::get('/subdistrict/{id}/edit', [SubDistrictController::class, 'edit'])->middleware('auth');
Route::patch('/subdistrict/{id}', [SubDistrictController::class, 'update'])->middleware('auth');
// Route::delete('/subdistrict/{id}', [SubDistrictController::class, 'destroy'])->middleware('auth', 'admin');

Route::get('/getsubdistrict', [SubDistrictController::class, 'getSubDistrict'])->middleware('auth');
Route::get('/getsubdistrict/{id}', [SubDistrictController::class, 'getSubDistrictSingle'])->middleware('auth');

Route::get('/cattletype', [CattleTypeController::class, 'index'])->middleware('auth');
Route::get('/cattletype/create', [CattleTypeController::class, 'create'])->middleware('auth');
Route::post('/cattletype', [CattleTypeController::class, 'store'])->middleware('auth');
Route::get('/cattletype/{id}', [CattleTypeController::class, 'show'])->middleware('auth');
Route::get('/cattletype/{id}/edit', [CattleTypeController::class, 'edit'])->middleware('auth');
Route::patch('/cattletype/{id}', [CattleTypeController::class, 'update'])->middleware('auth');
// Route::delete('/cattletype/{id}', [CattleTypeController::class, 'destroy'])->middleware('auth', 'admin');

Route::get('/cattlecolor', [CattleColorController::class, 'index'])->middleware('auth');
Route::get('/cattlecolor/create', [CattleColorController::class, 'create'])->middleware('auth');
Route::post('/cattlecolor', [CattleColorController::class, 'store'])->middleware('auth');
Route::get('/cattlecolor/{id}', [CattleColorController::class, 'show'])->middleware('auth');
Route::get('/cattlecolor/{id}/edit', [CattleColorController::class, 'edit'])->middleware('auth');
Route::patch('/cattlecolor/{id}', [CattleColorController::class, 'update'])->middleware('auth');
// Route::delete('/cattlecolor/{id}', [CattleColorController::class, 'destroy'])->middleware('auth', 'admin');

Route::get('/costinfo', [CostInfoController::class, 'index'])->middleware('auth');
Route::patch('/costinfo/{id}', [CostInfoController::class, 'update'])->middleware('auth', 'super_admin');