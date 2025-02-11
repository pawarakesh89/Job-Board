<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Job;
use App\Policies\JobPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Job::class => JobPolicy::class,
    ];


    
    public function boot(): void
    {
        //
    }
}
