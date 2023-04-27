<?php

namespace Tapp\NovaAuthenticationLog\Policies;

use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Laravel\Nova\Nova;
use Laravel\Nova\Http\Requests\NovaRequest;

class AuthenticationLogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return Nova::whenServing(function (NovaRequest $request) {
            return true;
        }, function (Request $request) {
            return false;
        });
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AuthenticationLog $authenticationLog): bool
    {
        return Nova::whenServing(function (NovaRequest $request) {
            return true;
        }, function (Request $request) {
            return true;
        });
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AuthenticationLog $authenticationLog): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AuthenticationLog $authenticationLog): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AuthenticationLog $authenticationLog): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AuthenticationLog $authenticationLog): bool
    {
        return false;
    }
}
