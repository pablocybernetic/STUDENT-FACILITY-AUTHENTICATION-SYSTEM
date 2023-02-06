<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;


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

//return all students
Route::get('/student','StudentController@index')->name('index');

//return single student
Route::get('/student/{student}','StudentController@show')->name('index');

//post to student table
Route::post('/student','StudentController@store');

//update student table
Route::put('/student/{student}','StudentController@update');

//Delete a student
Route::delete('/student/{student}','StudentController@destroy');