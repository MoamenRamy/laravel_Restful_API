<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\LessonPolicy;
use App\Policies\TagPolicy;
use App\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Lesson::class => LessonPolicy::class,
        Tag::class => TagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Passport::personalAccessTokenExpireIn(now()->addDays(10));
    }
}
