<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

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


Route::resource('property', PropertyController::class, ['only' => ['index', 'show']]);

Route::middleware(['verified'])->group(function () {
    Route::resource('property', PropertyController::class, [
        'only' => [
            'create', 'store', 'edit', 'update', 'destroy'
        ]
    ]);
});

