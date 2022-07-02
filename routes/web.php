<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RankingController::class, 'index'])->name('ranking.index');
Route::get('/mypage/{user_id}', [UserController::class, 'mypage'] )->name('user.mypage');
Route::get('/ranking/new', [RankingController::class, 'new'])->name('ranking.new');
Route::get('/ranking/{time}', [RankingController::class, 'list'])->name('ranking.list');
Route::post('/ranking/new', [RankingController::class, 'new'])->name('ranking.new.post');
Route::get('/ranking/edit/{ranking_id}', [RankingController::class, 'edit'])->name('ranking.edit');
Route::post('/ranking/edit/{ranking_id}', [RankingController::class, 'edit'])->name('ranking.edit.post');
Route::get('/ranking/result/{ranking_id}', [RankingController::class, 'result'])->name('ranking.result');
Route::post('/ranking/delete/{ranking_id}', [RankingController::class, 'delete'])->name('ranking.delete');
Route::get('/{ranking_id}/post/new', [PostController::class, 'new'])->name('post.new');
Route::post('/{ranking_id}/post/new', [PostController::class, 'new'])->name('post.new.post');
Route::get('/post/edit/{post_id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/edit/{post_id}', [PostController::class, 'edit'])->name('post.edit.post');
Route::post('/post/{post_id}/delete', [PostController::class, 'delete'])->name('post.delete');
Route::get('/retire_confirm/{user_id}', [UserController::class, 'retire_confirm'])->name('user.retire_confirm');//
Route::get('/retire_complete/{user_id}', [UserController::class, 'retire_complete'])->name('user.retire_complete');//
Route::post('/vote', [PostController::class, 'vote'])->name('post.vote');
Route::get('/post/{ranking_id}/detail/{post_id}/{rank}', [PostController::class, 'detail'])->name('post.detail');
Route::post('/{post_id}/comment/new', [CommentController::class, 'new'])->name('comment.new');
Route::get('/comment/{comment_id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::post('/comment/{comment_id}/edit', [CommentController::class, 'edit'])->name('comment.edit.post');
Route::post('/comment/{comment_id}/delete', [CommentController::class, 'delete'])->name('comment.delete');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
