<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::view('/', 'home');   // short hand for static page, just to load view page.

// Route::get('/', function () {
//     return view('home');
// });

Route::resource('jobs', JobController::class);

// Route::resource('jobs', JobController::class, [
//     'only' => ['index', 'show', 'create', 'store']
// ]);

// Route::resource('jobs', JobController::class, [
//     'except' => ['edit']
// ]);

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

// INDEX
// Route::get('/jobs', [JobController::class, 'index']);

// Route::get('/jobs', function() {
//     // $jobs = Job::all();                  // lazy loading
//     // $jobs = Job::with('employer')->get();   // eager loading
//     // $jobs = Job::with('employer')->paginate(3);
//     // $jobs = Job::with('employer')->simplePaginate(3);
//     // $jobs = Job::with('employer')->cursorPaginate(3);
//     $jobs = Job::with('employer')->latest()->simplePaginate(3);


//     // return view('jobs/index', [
//     return view('jobs.index', [
//         'jobs' => $jobs
//     ]);
// });

// Create
// Route::get('/jobs/create', [JobController::class, 'create']);

// Route::get('/jobs/create', function () {
//     return view('jobs.create');
// });

// Show
// Route::get('/jobs/{job}', [JobController::class, 'show']);

// Route::get('/jobs/{job}', function (Job $job) {     //Route model Binding
//     return view('jobs.show', ['job' => $job]);
// });

// Store
// Route::post('/jobs', [JobController::class, 'store']);

// Route::post('/jobs', function () {
//     // dd(request()->all());
//     // dd(request('title'));

//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required']
//     ]);

//     Job::create([
//         'title' => request('title'),
//         'salary' => request('salary'),
//         'employer_id' => 1
//     ]);

//     return redirect('/jobs');
// });

// Edit
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

// Route::get('/jobs/{job}/edit', function (Job $job) {
//     return view('jobs.edit', ['job' => $job]);
// });

// Update
// Route::patch('/jobs/{job}', [JobController::class, 'update']);

// Route::patch('/jobs/{job}', function (Job $job) {
//     // authorize (On hold...)

//     // validate
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required']
//     ]);

//     // update the job
//     // $job = Job::find($id);
//     // $job = Job::findOrFail($id);    // null
    
//     // $job->title = request('title');
//     // $job->salary = request('salary');
//     // $job->save();

//     $job->update([
//         'title' => request('title'),
//         'salary' => request('salary')
//     ]);

//     // and persist

//     // redirect to the job page
//     return redirect('/jobs/' . $job->id);

// });

// Destroy
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// Route::delete('/jobs/{job}', function (Job $job) {
//     // authorize (On hold...)

//     // delete the job
//     // $job = Job::findOrFail($id);
//     // $job->delete();
//     // $job = Job::findOrFail($id)->delete();

//     $job->delete();

//     // redirect
//     return redirect('/jobs');

// });

Route::view('/contact', 'contact');     // short hand for static page, just to load view page.

// Route::get('/contact', function () {
//     return view('contact');
// });