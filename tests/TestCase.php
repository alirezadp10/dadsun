<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = NULL)
    {
        return $this->actingAs($user ?: User::factory()->create());
    }

    protected function signInAsAdmin()
    {
        $role = Role::factory()->create(['title' => 'admin']);
        $user = User::factory()->create(['role_id' => $role->id]);
        $this->signIn($user);
        return $user;
    }
}
