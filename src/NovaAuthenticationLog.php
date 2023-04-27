<?php

namespace Tapp\NovaAuthenticationLog;

use Illuminate\Http\Request;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use Tapp\NovaAuthenticationLog\Resources\AuthenticationLog;

class NovaAuthenticationLog extends Tool
{
    public $logResource = AuthenticationLog::class;

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::resources([
            $this->logResource,
        ]);
    }

    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function menu(Request $request)
    {
        //
    }
}
