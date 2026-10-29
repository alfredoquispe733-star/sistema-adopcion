<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_user(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'rol' => 'admin',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'rol' => 'admin',
        ]);
    }

    public function test_user_has_rol(): void
    {
        $user = User::factory()->create(['rol' => 'veterinario']);

        $this->assertEquals('veterinario', $user->rol);
    }

    public function test_user_can_be_updated(): void
    {
        $user = User::factory()->create(['name' => 'Original']);

        $user->update(['name' => 'Updated']);

        $this->assertEquals('Updated', $user->fresh()->name);
    }

    public function test_user_can_be_deleted(): void
    {
        $user = User::factory()->create();
        $userId = $user->id;

        $user->delete();

        $this->assertDatabaseMissing('users', ['id' => $userId]);
    }
}
