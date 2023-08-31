<?php

use Modules\Competition\Http\Controllers\QuestionController;
use Modules\Competition\Http\Controllers\QuizzesController;
use Modules\Competition\Http\Controllers\UserQuizzesController;

Route::prefix('competition')->middleware('can:isAdmin')->group(function() {
    Route::resource('questions', QuestionController::class);
    Route::get('question/approve', [QuestionController::class, 'approve'])->name('questions.approve');
    Route::get('question/active/{id}', [QuestionController::class, 'activeStatus'])->name('questions.active');
    Route::get('question/in-active/{id}', [QuestionController::class, 'inActiveStatus'])->name('questions.inactive');

    Route::resource('quizzes', QuizzesController::class);
    Route::get('quizzes/approve', [QuizzesController::class, 'approve'])->name('quizzes.approve');
    Route::get('quizzes/active/{id}', [QuizzesController::class, 'activeStatus'])->name('quizzes.active');
    Route::get('quizzes/in-active/{id}', [QuizzesController::class, 'inActiveStatus'])->name('quizzes.inactive');
});

Route::prefix('user')->middleware('can:isUser')->group(function() {
    Route::resource('userquizzes', UserQuizzesController::class);
});
