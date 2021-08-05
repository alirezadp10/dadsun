<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Storage;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('public');
    }

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
