<?php

namespace App\Traits;

trait Authorizable
{
    public function authorizeRole($role): void
    {
        if(!auth()->user()->hasRole($role)) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function authorizePermission($permission): void
    {
        if(!auth()->user()->hasPermission($permission)) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function authorizeAnyPermission(array $permissions): void
    {
        if(!auth()->user()->hasAnyPermission($permissions)) {
            abort(403, 'Unauthorized action.');
        }
    }
}
