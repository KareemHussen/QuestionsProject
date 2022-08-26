<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CategoryController::class , 'categoryPage'])->name('category'); // Main Category

Route::get('category/addCategoryView', [CategoryController::class , 'addCategoryView'])->name('addCategoryView');
Route::post('category/addCategoryFun', [CategoryController::class , 'addCategoryFun'])->name('addCategoryFun');

Route::post('category/updateCategoryView', [CategoryController::class , 'updateCategoryView'])->name('updateCategoryView');
Route::post('category/updateCategoryFun', [CategoryController::class , 'updateCategoryFun'])->name('updateCategoryFun');

Route::post('category/delete', [CategoryController::class , 'deleteCategory']);
Route::post('category/deleteView', [CategoryController::class , 'deleteCategoryView'])->name('deleteCategory');




Route::get('question', [QuestionController::class , 'questionPage'])->name('question');

Route::post('question/addQuestionView', [QuestionController::class , 'addQuestionView'])->name('addQuestionView');
Route::post('question/addQuestionFun', [QuestionController::class , 'addQuestionFun'])->name('addQuestionFun');

Route::post('question/updateQuestionView', [QuestionController::class , 'updateQuestionView'])->name('updateQuestionView');
Route::post('question/updateQuestionFun', [QuestionController::class , 'updateQuestionFun'])->name('updateQuestionFun');

Route::post('question/delete', [QuestionController::class , 'deleteQuestionView'])->name('deleteQuestion');




Route::post('answer/addAnswerView', [AnswerController::class , 'addAnswerView'])->name('addAnswerView');
Route::post('answer/addAnswerFun', [AnswerController::class , 'addAnswerFun'])->name('addAnswerFun');

Route::get('answer/updateAnswerView', [AnswerController::class , 'updateAnswerView'])->name('updateAnswerView');
Route::post('answer/updateAnswerFun', [AnswerController::class , 'updateAnswerFun'])->name('updateAnswerFun');

Route::post('answer/delete', [AnswerController::class , 'deleteAnswerView'])->name('deleteAnswer');


//Auth::routes([
//    'register' => false, // Registration Routes...
//    'reset' => false, // Password Reset Routes...
//    'verify' => false, // Email Verification Routes...
//]);
