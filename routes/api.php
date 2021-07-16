<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('todos', [TodoController::class, 'index'])->name('todo.index');
Route::prefix('/todo')->group(function(){
        Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
        Route::put('/{id}', [TodoController::class, 'update'])->name('todo.update');
        Route::delete('/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
    }
);
