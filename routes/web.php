<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;






Route::get('/', [ArticleController::class, 'index']);
Route::put('/saveArticle', [ArticleController::class, 'saveArticle'])->name('saveArticle');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.edit');