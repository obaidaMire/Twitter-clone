<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\idea;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
     */
    public function boot(): void
    {
        $this->registerPolicies();
        #Role
        Gate::define("admin", function (User $user): bool {
            return (bool) $user->is_admin;
        });
        #permission
        // Gate::define("idea.delete", function (User $user,idea $idea): bool {
        //     return ((bool) $user->is_admin or $idea->user_id === $user->id); 
        // });
        // Gate::define("idea.edit", function (User $user,idea $idea): bool {
        //     return ((bool) $user->is_admin or $idea->user_id === $user->id);
        // });
    }
}
