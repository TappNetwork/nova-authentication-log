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
