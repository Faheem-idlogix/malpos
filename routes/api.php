<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CdClientController;
use App\Http\Controllers\CdUserController;
use App\Http\Controllers\CdBrandController;
use App\Http\Controllers\CdBranchController;
use App\Http\Controllers\UserController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::resource('cdclients', CdClientController::class);

Route::post('login',[UserController::class,'loginUser']);


Route::get('cdclient', [CdClientController::class, 'index'])->name('cdclient');
Route::post('cdclient_store', [CdClientController::class, 'store'])->name('cdclient_store');
Route::post('cdclient_update/{id}', [CdClientController::class, 'update'])->name('cdclient_update');
Route::get('cdclient_edit/{id}', [CdClientController::class, 'edit'])->name('cdclient_edit');
Route::delete('cdclient_delete/{id}', [CdClientController::class, 'destroy'])->name('cdclient_delete');

Route::get('cduser', [CdUserController::class, 'index'])->name('cduser');
Route::post('cduser_store', [CdUserController::class, 'store'])->name('cduser_store');
Route::post('cduser_update/{id}', [CdUserController::class, 'update'])->name('cduser_update');
Route::get('cduser_edit/{id}', [CdUserController::class, 'edit'])->name('cduser_edit');
Route::delete('cduser_delete/{id}', [CdUserController::class, 'destroy'])->name('cduser_delete');

Route::get('cdbrand', [CdBrandController::class, 'index'])->name('cdbrand');
Route::post('cdbrand_store', [CdBrandController::class, 'store'])->name('cdbrand_store');
Route::post('cdbrand_update/{id}', [CdBrandController::class, 'update'])->name('cdbrand_update');
Route::get('cdbrand_edit/{id}', [CdBrandController::class, 'edit'])->name('cdbrand_edit');
Route::delete('cdbrand_delete/{id}', [CdBrandController::class, 'destroy'])->name('cdbrand_delete');


Route::get('cdbranch', [CdBranchController::class, 'index'])->name('cdbranch');
Route::post('cdbranch_store', [CdBranchController::class, 'store'])->name('cdbranch_store');
Route::post('cdbranch_update/{id}', [CdBranchController::class, 'update'])->name('cdbranch_update');
Route::get('cdbranch_edit/{id}', [CdBranchController::class, 'edit'])->name('cdbranch_edit');
Route::delete('cdbranch_delete/{id}', [CdBranchController::class, 'destroy'])->name('cdbranch_delete');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
