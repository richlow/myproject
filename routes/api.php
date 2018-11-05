<?php

use Illuminate\Http\Request;

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

Route::apiResource('articles', \App\Http\Controllers\ArticleController::class);
Route::apiResource('authors', \App\Http\Controllers\AuthorController::class);
Route::apiResource('comments', \App\Http\Controllers\CommentController::class);

/*
|--------------------------------------------------------------------------
| Notes
|--------------------------------------------------------------------------
|
| You can check the various output cases of this API (with or without comments)
| by going to different indexes of the routes. The random data is generated
| through factories in database/seeds/DatabaseSeeder.php
|
| Run: php artisan db:seed
|
*/

Route::get(
    'articles/{article}/relationships/author',
    [
        'uses' => \App\Http\Controllers\ArticleRelationshipController::class . '@author',
        'as' => 'articles.relationships.author',
    ]
);
Route::get(
    'articles/{article}/author',
    [
        'uses' => \App\Http\Controllers\ArticleRelationshipController::class . '@author',
        'as' => 'articles.author',
    ]
);
Route::get(
    'articles/{article}/relationships/comments',
    [
        'uses' => \App\Http\Controllers\ArticleRelationshipController::class . '@comments',
        'as' => 'articles.relationships.comments',
    ]
);
Route::get(
    'articles/{article}/comments',
    [
        'uses' => \App\Http\Controllers\ArticleRelationshipController::class . '@comments',
        'as' => 'articles.comments',
    ]
);
