<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\CheckLogin;
use function Laravel\Ai\{agent};
use illuminate\Support\Str;
use Illuminate\Http\Request;

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/', [DashboardController::class, 'index'])->middleware(CheckLogin::class);
Route::get('/notes', [NoteController::class, 'index'])->middleware(CheckLogin::class);
Route::get('/quiz', [QuizController::class, 'index'])->middleware(CheckLogin::class);
Route::get('/show-quiz', [QuizController::class, 'show'])->middleware(CheckLogin::class);

Route::get('/playground-ai', function (Request $request) {
  $prompt = $request->prompt;

  
  if (empty($prompt)) {
    return view('playground-ai');
  }

  $response = agent(
    instructions: 'Kamu adalah seorang mentor Laravel yang membantu saya belajar pemrograman Laravel. Berikan jawaban yang singkat, jelas dan mudah dipahami.'
  )->prompt($prompt); 

  $html = Str::markdown((string) $response);

  return view('playground-ai', ['response' => $html]);
});