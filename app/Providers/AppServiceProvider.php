<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        // Paginator::useBootstrapFive();

        // Gate::define('edit-job', function (User $user, Job $job) {           // here user is, who is currently logged in.
        // // Gate::define('edit-job', function (User $user = null, Job $job) {    // what if user is a guest.
        // // Gate::define('edit-job', function (?User $user, Job $job) {          // make user a optional
        //     return $job->employer->user->is($user);
        // });
    }
}
