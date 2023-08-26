<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/{user}', [\App\Http\Controllers\UserController::class,'show']);

Route::get('/user/{id}/projects', [\App\Http\Controllers\UserProjectsController::class,'show']);

Route::get('/projects/{id}', [\App\Http\Controllers\ProjectController::class,'show']);

Route::get('projects/{id}/simple-tasks-list', [\App\Http\Controllers\ProjectTasksController::class,'show']);

Route::post('/projects', [\App\Http\Controllers\ProjectController::class,'store']);

Route::post('/projects/{project}/tasks', [\App\Http\Controllers\TaskController::class,'store']);

Route::put('/projects/{project}', [\App\Http\Controllers\ProjectController::class,'update']);

Route::delete('/projects/{project}', [\App\Http\Controllers\ProjectController::class,'destroy']);

Route::delete('/projects/{project}/tasks/{task_id}', [\App\Http\Controllers\ProjectTasksController::class,'destroy']);
