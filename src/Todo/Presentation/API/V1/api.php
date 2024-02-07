<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\Todo\Application\HTTP\API\V1\TodoItemController;
use Src\Todo\Application\HTTP\API\V1\TodoListController;

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

Route::prefix('api/v1')->middleware('auth:jwt')->group(function () {
    Route::get('todo_lists', [TodoListController::class, 'index']);
    Route::get('todo_lists/{todo_id}', [TodoListController::class, 'show']);
    Route::post('todo_lists', [TodoListController::class, 'store']);
    Route::put('todo_lists/{todo_id}', [TodoListController::class, 'update']);
    Route::delete('todo_lists/{todo_id}', [TodoListController::class, 'delete']);

    Route::get('todo_lists/{todo_id}/todo_items', [TodoItemController::class, 'index']);
    Route::get('todo_items/{todo_item}', [TodoItemController::class, 'show']);
    Route::post('todo_lists/{todo_id}/todo_items', [TodoItemController::class, 'store']);
    Route::put('todo_items/{todo_item}', [TodoItemController::class, 'update']);
    Route::delete('todo_items/{todo_item}', [TodoItemController::class, 'delete']);

});
