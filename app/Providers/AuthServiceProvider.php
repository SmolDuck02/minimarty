<?php

namespace App\Providers;

use App\Models\Good;
use App\Policies\GoodPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Good::class => GoodPolicy::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->registerPolicies();

        // Optional: Add any custom gates here with Gate::define()
    }
}
