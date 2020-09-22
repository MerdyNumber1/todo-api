<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

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
Route::group([
    'prefix' => 'api/tasks',
], function() {
    Route::get('/', [TasksController::class, 'getTasks']);
    Route::post('/', [TasksController::class, 'createTask']);
    Route::put('/{title}', [TasksController::class, 'updateTask']);
    Route::delete('/{title}', [TasksController::class, 'deleteTask']);
});
