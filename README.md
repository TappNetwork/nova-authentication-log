Nova UI for [laravel-authentication-log](https://github.com/rappasoft/laravel-authentication-log)

# Installation

``` sh
composer require tapp/nova-authentication-log
```

### Resource
Authentication Log resource will show up in the nova sidebar

### Relation on Authenticatable Resource (optional)
``` php
MorphMany::make(
    'Authentication Logs',
    'authentications',
    \Tapp\NovaAuthenticationLog\Resources\AuthenticationLog
),
```

### Configuration (optional)
``` sh
php artisan vendor:publish --tag="Tapp\NovaAuthenticationLog\ToolServiceProvider"
```
