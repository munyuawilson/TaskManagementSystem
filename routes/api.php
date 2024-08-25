<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\TaskController;

Route::prefix('v1')->group(function () {
    
    Route::get('tasks', [TaskController::class, 'index']);
    Route::get('tasks/{id}', [TaskController::class, 'show']);
    Route::post('tasks', [TaskController::class, 'store']);
    Route::put('tasks/{id}', [TaskController::class, 'update']);
    Route::patch('tasks/{id}/complete', [TaskController::class, 'complete']);
    Route::delete('tasks/{id}', [TaskController::class, 'destroy']);
});
