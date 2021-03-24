<?php

namespace Tests;

use App\Models\Auth\Role;
use App\Models\Auth\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Permission;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function loginAsAdmin()
    {
        $adminRole = factory(Role::class)->create(['name' => config('access.users.admin_role')]);
        $adminRole->givePermissionTo(factory(Permission::class)->create(['name' => 'view backend']));
        $user = factory(User::class)->create();
        $user->assignRole($adminRole);
        $this->actingAs($user);

        return $user;
    }
}
