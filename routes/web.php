<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function() {
    // $jobs = Job::all();                  // lazy loading
    // $jobs = Job::with('employer')->get();   // eager loading
    // $jobs = Job::with('employer')->paginate(3);
    // $jobs = Job::with('employer')->simplePaginate(3);
    // $jobs = Job::with('employer')->cursorPaginate(3);
    $jobs = Job::with('employer')->latest()->simplePaginate(3);


    // return view('jobs/index', [
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // dd(request()->all());
    // dd(request('title'));

    //validation...

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});