<?php

namespace App\Providers;

use App\Models\Store;
use App\Models\User;
use App\Policies\StorePolicy;
use Illuminate\Database\Eloquent\Model;
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
        // Gate::define('update-store', function (User $user, Store $store) {
        //     return $user->id === $store->user_id;
        // });
        Gate::policy(Store::class, StorePolicy::class);
        Gate::define('isPartner', fn(User $user) => $user->isAdmin() || $user->isPartner());
        // Model::preventLazyLoading(!app()->isProduction());

    }
}
