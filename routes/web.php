<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Jobs\TranslateJob;
use App\Models\Job;

Route::get('test', function () {
    $job = Job::first();

    TranslateJob::dispatch($job);

    // dispatch(function() {
    //     logger('hello from the queue!');
    // })->delay(5);

    return 'Done';
});

// Route::get('/test', function () {
//     // return new \App\Mail\JobPosted();

//     // \Illuminate\Support\Facades\Mail::to('jeffrey@laracasts.com')->send(
//     //     new \App\Mail\JobPosted()
//     // );

//     return 'Done';
// });

Route::view('/', 'home');
Route::view('/contact', 'contact');

// Route::resource('jobs', JobController::class);
// Route::resource('jobs', JobController::class)->middleware('auth');

// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit-job, job']);  // doesn't work
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit-job,job']);   // this works, no space.

// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
//     ->middleware('auth')
//     ->can('edit-job', 'job');

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);      // hw
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);    // hw

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Route::get('/login', [SessionController::class, 'create']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);