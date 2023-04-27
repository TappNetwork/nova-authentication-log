<?php

namespace Tapp\NovaAuthenticationLog;

use Illuminate\Support\Facades\Route;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Http\Middleware\Authenticate;
use Laravel\Nova\Nova;
use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog;
use Tapp\NovaAuthenticationLog\Http\Middleware\Authorize;
use Tapp\NovaAuthenticationLog\Policies\AuthenticationLogPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/nova-authentication-log.php' => config_path('nova-authentication-log.php'),
        ], 'config');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Nova::router(['nova', Authenticate::class, Authorize::class], 'nova-authentication-log')
            ->group(__DIR__ . '/../routes/inertia.php');

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/nova-authentication-log')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Gate::policy(
            config('nova-authentication-log.models.authentication_log', AuthenticationLog::class),
            config('nova-authentication-log.authentication_policy', AuthenticationLogPolicy::class)
        );
    }
}
