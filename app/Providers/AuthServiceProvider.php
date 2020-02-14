<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Quest' => 'App\Policies\QuestPolicy',
        'App\QuestLog' => 'App\Policies\QuestLogPolicy',
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::tokensCan([
            'basic' => 'View your name, email, phone and account timestamps',
            'full' => 'Perform actions as you',
        ]);
        Passport::setDefaultScope(['basic']);
    }
}
