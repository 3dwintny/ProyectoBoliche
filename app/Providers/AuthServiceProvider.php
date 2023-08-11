<?php

namespace App\Providers;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

// use Illuminate\Support\Facades\Gate;

//use Illuminate\Auth\Access\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->email == 'admonbolichequetgo@gmail.com' ?? null;
        });
 
        // ResetPassword::createUrlUsing(function ($user, string $token) {
        //     return 'https://example.com/reset-password?token='.$token;
        // });
    }
}