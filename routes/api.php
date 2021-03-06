<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CatController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\SkillController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('categories', [CatController::class, 'index']);
Route::get('categories/show/{id}', [CatController::class, 'show']);
Route::get('skills/show/{id}', [SkillController::class, 'show']);
Route::get('exams/show/{id}', [ExamController::class, 'show']);

Route::get('exams/show-questions/{id}', [ExamController::class, 'showQuestions']);
Route::post('exams/start/{id}', [ExamController::class, 'start']);
Route::get('exams/sbumit/{id}', [ExamController::class, 'submit']);
