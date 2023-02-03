<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->isAdminVol == 1;
        });

        /* define a user role */
        Gate::define('isNotAdmin', function($user) {
            return $user->isAdminVol == 0;
        });

        /* define a Without Documents role */
        Gate::define('withDocuments', function($user) {
            if ($user->isAdminVol == 1){
                return false;
            }
            $isContactModelVol=$user->documents
                                ->where('isContactModelVol','!=',0)
                                ->count();
            $isInscripModelVol=$user->documents
                                ->where('isInscripModelVol','!=',0)
                                ->count();
            if ($isInscripModelVol && $isContactModelVol){
                return true;
            }
        });

    }
}
