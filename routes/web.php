<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// INDEX
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

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs', function () {
    // dd(request()->all());
    // dd(request('title'));

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // authorize (On hold...)

    // update the job
    // $job = Job::find($id);
    $job = Job::findOrFail($id);    // null
    
    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    // and persist

    // redirect to the job page
    return redirect('/jobs/' . $job->id);

});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    // authorize (On hold...)

    // delete the job
    // $job = Job::findOrFail($id);
    // $job->delete();
    $job = Job::findOrFail($id)->delete();

    // redirect
    return redirect('/jobs');

});

Route::get('/contact', function () {
    return view('contact');
});