<?php

use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\RelationshipController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\UserController;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

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

Route::group(['prefix' => 'v1'], function()
{

    Route::apiResource('lessons', LessonController::class);

    Route::apiResource('users', UserController::class);

    Route::apiResource('tags', TagController::class);

    Route::any('lesson', function(){
        $message = 'please make sure to update to new version';

        return Response::json(
            $message,
            404,
        );
    });

    Route::any('user', function(){
        $message = 'please make sure to update to new version';

        return Response::json(
            $message,
            404,
        );
    });

    Route::any('tag', function(){
        $message = 'please make sure to update to new version';

        return Response::json([
            'data' => $message,
            'link' => url('documentation/api'),
            ],
            404,
        );
    });

    // reletional routes

    Route::get('users/{id}/lessons', [RelationshipController::class, 'userLessons']);

    Route::get('lessons/{id}/tags', [RelationshipController::class, 'lessonTags']);

    Route::get('tags/{id}/lessons', [RelationshipController::class, 'tagLessons']);
});

// Route::domain('{accout}.myapp.com')->group(function(){
//     Route::get('user/{id}', function($accout, $id){
//         //
//     });
// });

// Route::get('lessons/{lesson:slug}', function($lesson){
//     return $lesson;
// });

// Route::fallback(function(){
//     //
// });

// Route::redirect('lesson', 'lessons');

