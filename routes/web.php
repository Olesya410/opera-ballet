<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\QuizDescriptionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/author', [AuthorController::class, 'index'])->name('author');

Route::get('/Quiz', function (){
    return view('Quiz');
})->name('vopros');

Route::get('/lines', function (){
    return view('lines');
})->name('lines');

Route::get('/puzzles', function (){
    return view('puzzles');
})->name('puzzles');

// // вопросы-вопросы
// Route::get('/Quiz_question', function (){
//     return view('Quiz_question');
// })->name('Quiz_question');

// // вопрос-строки
// Route::get('/Quiz_lines', function (){
//     return view('Quiz_lines');
// })->name('quiz_lines');

// // вопросы-ребусы
// Route::get('/Quiz_puzzles', function (){
//     return view('Quiz_puzzles');
// })->name('quiz_puzzles');

Route::get('/result', function (){
    return view('result');
})->name('result');


// НОВЫЕ маршруты для вопросов по типам
// Route::get('/Quiz_question', [QuizController::class, 'questions'])->name('quiz_questions');
// // в файле routes/web.php
// Route::get('/quiz_questions/{author}', [QuizController::class, 'index'])->name('quiz_questions');
// Route::get('/Quiz_questions/{author}', [QuizController::class, 'showQuestions'])->name('quiz_questions');
// Route::get('/Quiz_lines', [QuizController::class, 'lines'])->name('quiz_lines');
// Route::get('/Quiz_puzzles', [QuizController::class, 'puzzles'])->name('quiz_puzzles');

// результат
Route::post('/save-results', [ResultController::class, 'save'])->name('saveResults');
Route::get('/results/{session}', [ResultController::class, 'show'])->name('showResults');

// Описание и викторина
Route::get('/description/{id}', [App\Http\Controllers\AuthorController::class, 'showDescription'])->name('description.show');