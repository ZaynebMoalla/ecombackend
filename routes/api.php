<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('scategories', ScategorieController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('articles' , ArticleController::class);
});
Route::get('/listarticles/{idscat}', [ArticleController::class,'showArticlesBySCAT']);

Route::get('/articles/art/articlespaginate', [ArticleController::class,'articlesPaginate']);
