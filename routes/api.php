<?php

use App\Http\Controllers\TaskController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/// create a create route for the tasks api
Route::post('/createTask',[TaskController::class,'createNewTask']);


// create get all tasks endpoint
Route::get('/getAllTasks',[TaskController::class,'readAllTasks']);
Route::get('/getOneTasks',[TaskController::class,'readOneTask']);

// update a particular record
Route::put('/updateTask',[TaskController::class,'updateTask']);