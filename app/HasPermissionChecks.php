<?php

namespace App;

use App\Helpers\PermissionHelper;

trait HasPermissionChecks
{
    protected function withPermission(string $permission, callable $action, string $guard = 'pessoas')
    {
        return PermissionHelper::checkAndExecute($permission, $action, $guard);
    }
}
