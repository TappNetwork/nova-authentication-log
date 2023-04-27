<?php

return [
    'authenticatable_resources' => [
        \App\Nova\User::class,
    ],

    'authentication_log_policy' => \NovaComponents\AuthenticationLog\Policies\AuthenticationLogPolicy::class,

    'authentication_log_model' => \Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog::class,
];
