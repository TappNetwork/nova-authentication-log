Nova UI for [laravel-authentication-log](https://github.com/rappasoft/laravel-authentication-log)

# Installation

``` sh
composer require tapp/nova-authentication-log
```

### Resource
Authentication Log resource will show up in the nova sidebar.  
![image](https://user-images.githubusercontent.com/7796074/234967365-3b005767-ef1d-497e-9f4a-837ac05848b6.png)
![image](https://user-images.githubusercontent.com/7796074/234967268-8659eb15-28d4-469d-bbb4-648d11013c86.png)

### Relation on Authenticatable Resource (optional)
``` php
MorphMany::make(
    'Authentication Logs',
    'authentications',
    \Tapp\NovaAuthenticationLog\Resources\AuthenticationLog::class
),
```

![image](https://user-images.githubusercontent.com/7796074/234967155-6366f923-9162-4599-af9f-578eb8756b0d.png)


### Configuration (optional)
``` sh
php artisan vendor:publish --provider="Tapp\NovaAuthenticationLog\ToolServiceProvider" --tag="config"
```
