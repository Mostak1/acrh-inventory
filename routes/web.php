<?php

use App\Http\Controllers\RoleController;
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
    return view('input');
});
// Route::middleware('auth')->resources([
//     'role' => RoleController::class
// ]);
Route::middleware('checkRole:2')->group(function () {
    // Routes that require the specified role
});
